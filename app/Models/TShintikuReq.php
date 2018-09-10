<?php

namespace App\Models;

use App\Contracts\RequestFormStatus;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use App\Helpers\HelperFunc;
use App\Helpers\ViewConst;
use Carbon\Carbon;
use App\Models\Builder;

class TShintikuReq extends BaseModel
{
    const REGISTER_PERSON = 1;

    const NAME_HOMEMAKER = 'HM/地場';
    const POS_GROUPFC = 2;
    const NAME_GROUPFC = 'FC';
    const POS_SUPERWALL = 3;
    const NAME_SUPERWALL = 'SW';
    const POS_APARTMENT = 4;
    const NAME_APARTMENT = 'マンション';

    /**
     * @var string
     */
    protected $table = 't_shintiku_req';

    /**
     * @var string
     */
    protected $primaryKey = 'shintiku_id';

    protected $dates = ['upd_date', 'regis_date'];

    /**
     * @var array
     */
    protected $fillable = [
        'knr_user_id',
        'kento_plan_id',
        'syoukai_kbn',
        'shimei',
        'shimei_kana',
        'birth_ymd',
        'company_name',
        'syozokubusyo_mei',
        'syain_kbn',
        'mail',
        'idm_denwa_no',
        'idm_keitai_tel',
        'renrakusaki_kbn',
        'renraku_kbn',
        'seshu_renraku',
        's_sei_local',
        's_mei_local',
        's_sei_kana',
        's_mei_kana',
        's_birth_ymd',
        's_mail',
        's_idm_denwa_no',
        's_idm_keitai_tel',
        's_zip_no',
        's_todouhuken_mei',
        's_sikutyouson_mei',
        's_tyoumei',
        's_tat_mei',
        'bkn_zip_no',
        'bkn_todouhuken_mei',
        'bkn_sikutyouson_mei',
        'bkn_tyoumei',
        'bkn_tat_mei',
        'kibotaio_kbn',
        'tyuko_flg',
        'anken_kbn',
        'tochi_flg',
        'yosan_all_kbn',
        'yosan_all',
        'yosan_month_kbn',
        'yosan_month',
        'syunko_ziki_kbn',
        'kouhou_kbn',
        'kibo_builder_1',
        'kibo_builder_2',
        'kibo_builder_3',
        'kibo_builder_4',
        'kibo_builder_5',
        'kibo_builder_6',
        'kibo_builder_7',
        'kibo_builder_8',
        'kibo_builder_9',
        'kibo_builder_10',
        'kibo_builder_11',
        'kibo_builder_12',
        'kibo_builder_13',
        'kibo_builder_14',
        'kibo_builder_15',
        'req_form_status',
        'req_memo',
        'upd_date',
        'patch_id'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Save data in database
     *
     * @param $data
     * @return bool
     */
    public function saveData($data)
    {
        $tShintikuReq = new TShintikuReq();
        $tShintikuReq->knr_user_id          = $data['knr_user_id'];
        $tShintikuReq->kento_plan_id        = $data['kento_plan_id'];
        $tShintikuReq->shimei               = $data['sei_local'] .' '. $data['mei_local'];
        $tShintikuReq->shimei_kana          = $data['sei_kana'] .' '. $data['mei_kana'];
        $tShintikuReq->birth_ymd            = $data['birth_ymd'];
        $tShintikuReq->company_name         = $data['company_name'];
        $tShintikuReq->syozokubusyo_mei     = $data['syozokubusyo_mei'];
        $tShintikuReq->syain_kbn            = $data['syain_kbn'];
        $tShintikuReq->mail                 = $data['mail'];
        $tShintikuReq->idm_denwa_no         = $data['idm_denwa_no'];
        $tShintikuReq->idm_keitai_tel       = $data['idm_keitai_tel'];
        $tShintikuReq->renrakusaki_kbn      = TShintikuReq::REGISTER_PERSON;
        $tShintikuReq->req_form_status      = RequestFormStatus::REGISTED_STATUS;
        $tShintikuReq->upd_date             = date('Y-m-d H:i:s');
        $tShintikuReq->seshu_renraku        = $data['seshu_renraku'];
        $tShintikuReq->syoukai_kbn          = $data['syoukai_kbn'];
        $tShintikuReq->s_sei_kana           = $data['s_sei_kana'];
        $tShintikuReq->s_mei_kana           = $data['s_mei_kana'];
        $tShintikuReq->s_birth_ymd          = $data['s_birth_ymd'];
        $tShintikuReq->s_sei_local          = $data['s_sei_local'];
        $tShintikuReq->s_mei_local          = $data['s_mei_local'];
        $tShintikuReq->s_idm_denwa_no       = isset($data['s_idm_denwa_no']) ? $data['s_idm_denwa_no'] : null;
        $tShintikuReq->s_idm_keitai_tel     = isset($data['s_idm_keitai_tel']) ? $data['s_idm_keitai_tel'] : null;
        $tShintikuReq->s_mail               = $data['s_mail'];
        $tShintikuReq->s_zip_no             = $data['zip21'] . $data['zip22'];
        $tShintikuReq->s_todouhuken_mei     = $data['s_todouhuken_mei'];
        $tShintikuReq->s_sikutyouson_mei    = $data['s_sikutyouson_mei'];
        $tShintikuReq->s_tyoumei            = $data['s_tyoumei'];
        $tShintikuReq->s_tat_mei            = $data['s_tat_mei'];
        $tShintikuReq->bkn_todouhuken_mei   = $data['bkn_todouhuken_mei'];
        $tShintikuReq->bkn_sikutyouson_mei  = $data['bkn_sikutyouson_mei'];
        $tShintikuReq->anken_kbn            = isset($data['anken_kbn']) && !empty($data['anken_kbn']) ? implode(',',$data['anken_kbn']):'';
        $tShintikuReq->tochi_flg            = ($data['tochi_flg'] != NULL) ? 1: 0;
        $tShintikuReq->yosan_all_kbn        = $data['yosan_all_kbn'];
        $tShintikuReq->kibotaio_kbn         = $data['kibotaio_kbn'];
        $tShintikuReq->tyuko_flg            = ($data['tyuko_flg'] != NULL) ? 1: 0;
        $tShintikuReq->seshu_renraku        = $data['seshu_renraku'];
        $tShintikuReq->renraku_kbn          = '000';
        if (isset($data['renraku_kbn'])) {
            $tShintikuReq->renraku_kbn = $data['renraku_kbn'];
        }
        //save kibo_builder_1~15
        foreach ( $data['kibo_builder'] as $key => $value) {
            $x = $key + 1;
            $key_name = "kibo_builder_$x"  ;
            $tShintikuReq->{$key_name} = $value;
        }

        $tShintikuReq->req_memo = $data['req_memo'];
        $tShintikuReq->regis_date = Carbon::now()->format('Y-m-d H:i:s');
        if (! $tShintikuReq->save()) {
            return false;
        }

        return true;
    }

    /**
     * Format data request
     *
     * @param $request
     * @return array
     */
    public function formatData($request)
    {
        $is_Official = $request->syoukai_kbn == ViewConst::BUILDER_SYOUKAI_SELF;
        $results = [];
        $user = new User();
        $infoUser = $user->getUserBy(Auth::user()->knr_user_id);
        $results['knr_user_id']         = $infoUser->knr_user_id;
        $results['sei_local']           = $infoUser->sei_local;
        $results['mei_local']           = $infoUser->mei_local;
        $results['sei_kana']            = $infoUser->sei_kana;
        $results['mei_kana']            = $infoUser->mei_kana;
        $results['birth_ymd']           = $infoUser->birth_ymd;
        $results['company_name']        = $infoUser->company_mei;
        $results['idm_denwa_no']        = $infoUser->idm_denwa_no;
        $results['idm_keitai_tel']      = $infoUser->idm_keitai_tel;
        $results['mail']                = $infoUser->mail;
        $results['address']             = '〒'.substr($infoUser->zip_no, 0, 3).'-'.substr($infoUser->zip_no, 3, 6) . "　" . $infoUser->todouhuken_mei . $infoUser->sikutyouson_mei . $infoUser->tyoumei;
        $results['company_mei']         = $infoUser->company_mei;
        $results['syozokubusyo_mei']    = $request->syozokubusyo_mei;
        $results['syain_kbn']           = $request->syain_kbn;
        $results['kento_plan_id']       = $request->kento_plan_id;

        //renraku kbn
        $reqRenraku = $request->renraku_kbn_check;
        if ($reqRenraku && is_array($reqRenraku)) {
            $listRenraku = array_keys(HelperFunc::listContactMethods());
            $dataRenraku = [];
            foreach ($listRenraku as $method) {
                $dataRenraku[$method] = '0';
                if (isset($reqRenraku[$method])) {
                    $dataRenraku[$method] = '1';
                }
            }
            $results['renraku_kbn']      = implode('', $dataRenraku);
        }

        $results['syoukai_kbn']         = $request->syoukai_kbn;
        $results['s_sei_kana']          = $is_Official ? $infoUser->sei_kana : $request->s_sei_kana;
        $results['s_mei_kana']          = $is_Official ? $infoUser->mei_kana : $request->s_mei_kana;
        $results['s_sei_local']         = $is_Official ? $infoUser->sei_local : $request->s_sei_local;
        $results['s_mei_local']         = $is_Official ? $infoUser->mei_local : $request->s_mei_local;
        $results['s_birth_ymd']         = $is_Official ? $infoUser->birth_ymd : $request->s_birth_ymd;
        $results['s_idm_denwa_no']      = $is_Official ? $infoUser->idm_denwa_no : $request->s_idm_denwa_no;
        $results['s_idm_keitai_tel']    = $is_Official ? $infoUser->idm_keitai_tel : $request->s_idm_keitai_tel;
        $results['s_mail']              = $is_Official ? $infoUser->mail : $request->s_mail;
        $results['zip21']               = $is_Official ? substr($infoUser->zip_no, 0, 3) : $request->zip21;
        $results['zip22']               = $is_Official ? substr($infoUser->zip_no, 3, 4) : $request->zip22;
        $results['s_todouhuken_mei']    = $is_Official ? $infoUser->todouhuken_mei : $request->pref21;
        $results['s_sikutyouson_mei']   = $is_Official ? $infoUser->sikutyouson_mei : $request->addr21;
        $results['s_tyoumei']           = $is_Official ? $infoUser->tyoumei : $request->strt21;
        $results['s_tat_mei']           = $is_Official ? $infoUser->tat_mei : $request->s_tat_mei;
        $results['bkn_todouhuken_mei']  = $request->bkn_todouhuken_mei;
        $results['bkn_sikutyouson_mei'] = $request->bkn_sikutyouson_mei;
        $results['anken_kbn']           = $request->anken_kbn;
        $results['yosan_all_kbn']       = $request->yosan_all_kbn;
        $results['tochi_flg']           = $request->tochi_flg;
        $results['tyuko_flg']           = $request->tyuko_flg;
        $results['kibo_builder']        = $request->kibo_builder;
        $results['kibotaio_kbn']        = $request->kibotaio_kbn;
        $results['req_memo']            = $request->req_memo;
        $results['kibo_builder_txt']    = $request->kibo_builder_txt;
        $results['seshu_renraku']       = $request->seshu_renraku;


        return $results;
    }

    /*
     * get list data
     */
    public static function getData($data = [])
    {
        $opts = [
            'fields' => ['*'],
            'orderby' => 'upd_date',
            'order' => 'desc',
            'user_id' => Auth::id(),
            'per_page' => self::PER_PAGE,
            'page' => 1
        ];

        $opts = array_merge($opts, $data);

        $collection = self::select($opts['fields']);

        if ($opts['user_id']) {
            $collection->where('knr_user_id', $opts['user_id']);
        }

        if (self::isInFillable($opts['orderby'])) {
            $collection->orderBy($opts['orderby'], $opts['order']);
        }

        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }

        return $collection->get();
    }

    /**
     * get reform status
     * @return string
     */
    public function getStatusLabel($statuses = [])
    {
        if (!$statuses) {
            $statuses = HelperFunc::listReformStatuses();
        }
        if (isset($statuses[$this->req_form_status])) {
            return $statuses[$this->req_form_status];
        }
        return null;
    }

    /**
     * get syoukai label
     * @return string
     */
    public function getSyoukaiLabel($builderSyoukais = [])
    {
        if (!$builderSyoukais) {
            $builderSyoukais = HelperFunc::listBuilderSyoukais();
        }
        if (isset($builderSyoukais[$this->syoukai_kbn])) {
            return $builderSyoukais[$this->syoukai_kbn];
        }
        return null;
    }

    /**
     * get anken label
     * @return string
     */
    public function getAnkenLabel($builderAnkens = [])
    {
        if (!$builderAnkens) {
            $builderAnkens = HelperFunc::listBuilderAnkens();
        }
        if (isset($builderAnkens[$this->anken_kbn])) {
            return $builderAnkens[$this->anken_kbn];
        }
        return null;
    }

    /**
     * get taioukbn name
     * @return string
     */
    public function getTaiouKbnName()
    {
        $arrTaiou = str_split($this->kibotaio_kbn);
        $result = [self::NAME_HOMEMAKER];
        if (isset($arrTaiou[self::POS_GROUPFC]) && $arrTaiou[self::POS_GROUPFC] == '1') {
            $result[] = self::NAME_GROUPFC;
        }
        if (isset($arrTaiou[self::POS_SUPERWALL]) && $arrTaiou[self::POS_SUPERWALL] == '1') {
            $result[] = self::NAME_SUPERWALL;
        }
        if (isset($arrTaiou[self::POS_APARTMENT]) && $arrTaiou[self::POS_APARTMENT] == '1') {
            $result[] = self::NAME_APARTMENT;
        }
        return implode('、', $result);
    }

    /**
     * get list builder name
     */
    public function getListKiboBuilderName()
    {
        $numKibo = 15;
        $kiboIds = [];
        for ($i = 1; $i <= $numKibo; $i++) {
            if ($this->{'kibo_builder_' . $i}) {
                $kiboIds[] = $this->{'kibo_builder_' . $i};
            }
        }
        if (!$kiboIds) {
            return null;
        }
        $arrBuiler = Builder::whereIn('builder_id', $kiboIds)
                ->pluck('builer_mei')
                ->toArray();
        return implode('　●', $arrBuiler);
    }

}
