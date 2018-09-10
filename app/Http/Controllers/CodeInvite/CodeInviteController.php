<?php

namespace App\Http\Controllers\CodeInvite;

use App\Http\Requests\CodeInviteRequest;
use App\Http\Requests\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Routes\Breadcrumb;
use App\Queues\EmailQueue;
use App\Models\Syoutai;
use App\Models\SyoutaiKanri;
use App\Helpers\HelperFunc;
use Carbon\Carbon;
use LxMenu;

class CodeInviteController extends Controller
{
    
   
    /*
     * construct
     */
    public function __construct() 
    {
        Breadcrumb::add('トップページ', route('page.index'));
        LxMenu::setActive('code_invite');
    }

    /**
     * 
     * @return type
     */
    public function showFormCodeInvite()
    {
        Breadcrumb::add(trans('codeinvite.breadcrumb-invite'));
        if( !auth()->check() ) {
            return "rerror";
        }
        //get year
        $year = date('Y');
        
        // get id user 
        $id = Auth::id();
        // Check the code for the release code invite
        $dataSyoutaiKanri = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->first();

        
        if ( !$dataSyoutaiKanri ) { 
            
            return redirect()->route('auth.login');
        }
        // unset session
        if (Session::has('codeInvite')) {
            
            $codeInvite = Session::get('codeInvite');
            Session::forget('codeInvite');
            Session::forget('mail');
        }
        
        return view('codeinvite.form-code-invite', compact('dataSyoutaiKanri','codeInvite'));
    }
    
    public function postCodeInvite(CodeInviteRequest $request)
    {
        
        $year = date('Y');
        // get id user 
        $id = Auth::id();
        
        if (Auth::user()->mail == $request ->syoutai_mail) {
            return redirect()
                    ->back()
                    ->with(['error_message' =>trans('codeinvite.email_duplicate')]);
        }
 
        // Check the code for the release code invite
        $dataSyoutaiKanri = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->first();
 
        $dataSyoutai = Syoutai::where('knr_user_id',$id)->whereYear('syoutai_cd_gen_ymd', $year)->get();

        if (!$dataSyoutai && count($dataSyoutai) == 0) {

            return redirect()->route('auth.login');
        }
        

        foreach (  $dataSyoutai as $syoutai) {
            
            $dateLimit = Carbon :: parse($syoutai->syoutai_cd_lmt_ymd);

            if ( $syoutai ->syoutai_regis_ymd == null && $dateLimit ->lt(Carbon::now()) ) {

                $dataRecord[] = $syoutai ->syoutai_cd;
                
            }
            
            if ( $syoutai -> syoutai_mail_status == Syoutai::STATUS_SEND_MAIL_ERROR) {
                
                $dataErrorMail[] = $syoutai ->syoutai_cd;
            }
        }
        
        
        if (!isset($dataRecord)){
            
            $dataRecord = array();
        }
        
        if (!isset($dataErrorMail)){
            
            $dataErrorMail = array();
        }
        
        $dataErrorRecord = array_merge($dataRecord,$dataErrorMail);

         if( !$dataSyoutaiKanri ) { 
            
            return redirect()->route('auth.login');
        }

        
        $number = count($dataErrorRecord);
       
        if ( $number > 0  ) {

            $syoutai_cnt = $dataSyoutaiKanri ->syoutai_cnt - $number;
            
            $dataUpdate = array('syoutai_cnt' => $syoutai_cnt);

            if ( $syoutai_cnt < $dataSyoutaiKanri->syoutai_cnt || $syoutai_cnt = $dataSyoutaiKanri->syoutai_cnt) {

                $dataSyoutaiKanri = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->update($dataUpdate);
            }
            
            foreach ( $dataErrorRecord as  $key => $unrecord ) {
                      
                $syoutai = Syoutai::where('syoutai_cd', $unrecord)->delete();
            }
            
  
        }

        // insert information Release code invite in session
        $dataCode = [
            'syoutai_cd' => $request ->syoutai_cd,
            'syoutai_sei' => $request ->syoutai_sei,
            'syoutai_mei' => $request ->syoutai_mei,
            'syoutai_mail' => $request ->syoutai_mail,
            'kankei_flg' => $request ->kankei_flg,
            
        ];
        
        
       Session::put('codeInvite',$dataCode);
      
       return redirect()->route('code.invite.confirm-code');
    }
    
    /**
     * 
     * @return type
     */
    public function showFormConfirmCodeInvite()
    {
        Breadcrumb::add(trans('codeinvite.breadcrumb-invite'));
        $year = date('Y');
        // get id user 
        $id = Auth::id();
        
        $company_mei = Auth::user()->company_mei;
        $name = Auth::user()->sei_local .'　'.Auth::user()->mei_local;
        $mail = Auth::user()->mail;

        $dataSyoutaiKanri = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->first();
       // check information Release code invite in session
        if (!Session::has('codeInvite')) {
             return redirect() ->route('code.invite.invite');
        }
        
        $dataSyoutai = Session::get('codeInvite');
        $dataSyoutai['company_mei'] = $company_mei;
        $dataSyoutai['name'] = $name;
        $dataSyoutai['mail'] = $mail;
        $dataSyoutai['start_date'] = Carbon::now()->format('Y/m/d'); 
        $dataSyoutai['end_date'] = Carbon::parse(Carbon::now())->addDay(7)->format('Y/m/d'); 
        return view('codeinvite.confirm-code-invite', compact('dataSyoutaiKanri','dataSyoutai'));
    }
    
    /**
     * 
     * @return type
     */
    public function postComfirmCodeInvite(Requests $request)
    {
        if (!Session::has('codeInvite')) {
             return redirect() ->route('code.invite.invite');
        }
        // get data code invite 
        $dataSyoutai = Session::get('codeInvite');
 
        $syoutai = new Syoutai();
        $syoutai->knr_user_id = Auth::user()->knr_user_id;
        $syoutai->syoutai_mail = $dataSyoutai['syoutai_mail'];
        $syoutai->syoutai_cd = $dataSyoutai['syoutai_cd'];
        $syoutai->kankei_flg = $dataSyoutai['kankei_flg'];
        $syoutai->syoutai_sei = $dataSyoutai['syoutai_sei'];
        $syoutai->syoutai_mei = $dataSyoutai['syoutai_mei'];
        $syoutai->syoutai_cd_gen_ymd = Carbon::now()->format('Y/m/d');
        $syoutai->syoutai_cd_lmt_ymd = Carbon::parse(Carbon::now())->addDay(7)->format('Y/m/d');
        $syoutai->syoutai_mail_status = Syoutai::STATUS_SEND_MAIL;
        $syoutai->upd_date = Carbon::now();
        
        // save data success full
        if ( $syoutai->save() ) {
            
            $year = date('Y');
            // get id user 
            $id = Auth::id();
            
            $dataSyoutaiKanri = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->first();
            
            $syoutai_cnt = $dataSyoutaiKanri ->syoutai_cnt + SyoutaiKanri::AUTO_COUNT;
            
            $updateSyoutai = array('syoutai_cnt'=>$syoutai_cnt,'upd_date'=>Carbon::parse(Carbon::now()));
            
            $dataSyoutaiKanriUpdate = SyoutaiKanri::where('knr_user_id',$id)->whereYear('syoutai_start_ymd', $year)->update($updateSyoutai);

            $dateend = Carbon::parse(Carbon::now())->addDay(7)->format('Y/m/d');
            $year = substr($dateend,0,4);
            $month = substr($dateend,5,2);
            $day = substr($dateend,8,2);
            
            Mail::to($dataSyoutai['syoutai_mail'])->queue(new EmailQueue(
                    'mails.code.send-code',
                    Lang::get('codeinvite.subject_code_invite'),
                        [
                            'id'   =>  $id,
                            'invite_person' => Auth::user()->sei_local .'　'.Auth::user()->mei_local,
                            'name' => $dataSyoutai['syoutai_sei'] . '　' . $dataSyoutai['syoutai_mei'],
                            'dateend' => $year.'年'.$month.'月'.$day.'日',
                            'code' => $dataSyoutai['syoutai_cd'],
                        ]
                ));
            
            if( count(Mail::failures()) > 0 ) {
                
                $updateErrorMail = array('syoutai_mail_status'=>Syoutai::STATUS_SEND_MAIL_ERROR);
                
                $dataSyoutai = Syoutai::where('knr_user_id',Auth::user()->knr_user_id)->whereYear('syoutai_cd_gen_ymd', $year)->update($updateErrorMail);
            }
            
            $updateSuccessMail = array('syoutai_mail_status'=>Syoutai::STATUS_SEND_MAIL_SUCCESS);
                
            $dataSyoutais = Syoutai::where('knr_user_id',Auth::user()->knr_user_id)->whereYear('syoutai_cd_gen_ymd', $year)->update($updateSuccessMail); 
            
        }
        

       Session::put('mail',$dataSyoutai['syoutai_mail']);
       
       return redirect()->route('code.invite.thanks-code');
    }
    
    /**
     * 
     * @return type
     */
    
    public function thanksCodeInvite()
    {
        if (Session::has('codeInvite')) {

            Session::forget('codeInvite');

        }
        
        $mail = Session::get('mail');
        
        return view('codeinvite.thanks-code-invite',compact('mail'));
    }
}
