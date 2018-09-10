<?php

namespace App\Http\Controllers\RegisterFamily;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccuracyFamilyRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Syoutai;
use App\Models\SyoutaiKanri;
use DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;
class AccuracyFamilyController extends Controller
{
    
    // 

    //const NUMBER_SYOUTAI_CNT = 1;
    /**
     * Get form accuracy family
     *
     * @return 
    */
   
    public function getAccuracyFamily() 
    {
        if (Auth::user()) {

            return redirect()->route('page.index');
        }

        return view('registerfamily.accuracy-family');
    }

     /**
     * Posts an accuracy family.
     *
     * @param      \App\Http\Requests\AccuracyFamilyRequest  $request  The request
     */
    
    public function postAccuracyFamily(AccuracyFamilyRequest $request) 
    {
        $data = [
            'mail'       => $request->syoutai_mail,
            'touroku_cd' => $request->syoutai_cd,
        ];
        // select data base data = $request->syoutai_mail and $request->code in t_syoutai 
        
        $dataSyoutai = Syoutai::select('knr_user_id', 'syoutai_mail', 'syoutai_cd', 'syoutai_cd_lmt_ymd')->Where('syoutai_mail', $request->syoutai_mail)->where('syoutai_cd', $request->syoutai_cd)->whereNotNull('syoutai_cd_lmt_ymd')->first();

        
        // if the data does not exist
        
        if (empty($dataSyoutai )) {

            return redirect('accuracy-family')->with(['flash_level'=>'danger','error_message'=>"招待メールアドレスまたは招待コードが正しくありません"]); 
        
        } else {

            // 
            $dateLimit = Carbon :: parse($dataSyoutai->syoutai_cd_lmt_ymd);
            
            if ( $dateLimit -> lt(Carbon::now()) ) {

                // delete record
                //$syoutai = Syoutai::where('syoutai_cd', $dataSyoutai->syoutai_cd)->delete();
                
                // delete success full 
                //if ($syoutai) {

                    //update m_syoutai_kanri
                    //$dataSyoutaiKanri = SyoutaiKanri::select('knr_user_id','syoutai_cnt')->where('knr_user_id',$dataSyoutai->knr_user_id)->first();

                    // : check if syoutai_cnt < 0 

                   // $num_syoutai_cnt = $dataSyoutaiKanri->syoutai_cnt - 1;
                    
                   // SyoutaiKanri::where('knr_user_id',$dataSyoutaiKanri->knr_user_id)->update(array('syoutai_cnt'=>$num_syoutai_cnt));

                    return redirect('accuracy-family')->with(['flash_level'=>'danger','error_message'=>"有効期限が過ぎていますので登録できません。"]);
                //}

            } else {
                // redirect to register family
                // 

                if (Session::has('newMember')) {
                    Session::forget('newMember');
                }

            
                Session::put('newMember', $data);

                return redirect('register-family')->with(['flash_level'=>'success','flash_message'=>$request->syoutai_mail]);
               
            }

        }

    }
}
