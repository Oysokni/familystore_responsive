<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Helpers\ViewConst;

class Policy extends BaseModel
{
    const TYPE_REGISTER_POLICY = 1;
    const TYPE_REFORM_POLICY = 2;
    const TYPE_BUILDER_POLICY = 3;
    /**
     *
     * @var string
     */
    protected $table = 'm_policy';

    /**
     *
     * @var string
     */
    protected $primaryKey = 'policy_id';

    /**
     *
     * @var boolean
     */
    public $incrementing = true;

    /**
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'policy_id',
        'company_cd',
        'reform',
        'builder_intro',
        'regis_license ',
        'upd_date'
    ];

    /**
     * get policies by company cd
     * @param type $company_cd
     * @return collection
     */
    public static function getPoliciesByCompanyCd($company_cd)
    {
        $policies = self::select('*')->where('company_cd', $company_cd);
        return $policies->first();
    }

    /**
     * get policy link
     * @return string
     */
    public static function getReformPolicyLink()
    {
        $user = auth()->user();
        $userType = $user->memberType();
        $policy = self::getPoliciesByCompanyCd($user->company_cd);
        return self::getPolicyLink($policy, $userType, Policy::TYPE_REFORM_POLICY);
    }

    /**
     * get builder policy link
     */
    public static function getBuilderPolicyLink()
    {
        $user = auth()->user();
        $policy = self::getPoliciesByCompanyCd($user->company_cd);
        if ($policy) {
            $policy->builder_intro_1 = $policy ? ViewConst::MEMBER_PDF_PATH . "/" . $user->company_cd . "/" . $policy->builder_intro : ViewConst::MEMBER_PDF_PATH . "/" . ViewConst::BUILDER_PDF_DEFAULT_1;
            $policy->builder_intro_2 = ViewConst::MEMBER_PDF_PATH . "/" . ViewConst::BUILDER_PDF_DEFAULT_2;
        } else {
            $policy = new \stdClass();
            $policy->builder_intro_1 = ViewConst::MEMBER_PDF_PATH . "/" . ViewConst::BUILDER_PDF_DEFAULT_1;
            $policy->builder_intro_2 = ViewConst::MEMBER_PDF_PATH . "/" . ViewConst::BUILDER_PDF_DEFAULT_2;
        }
        return $policy;
    }

    /**
     * get register policy link
     */
    public static function getRegisterPolicyLink($limeUser, $userType)
    {
        $policy = $userType == User::TYPE_FAMILY ? null : self::getPoliciesByCompanyCd($limeUser->company_cd);
        return self::getPolicyLink($policy, $userType, Policy::TYPE_REGISTER_POLICY);
    }

    /**
     * get family policy type
     */
    public static function getFamilyPolicyLink($policyType)
    {
        switch($policyType) {
            case self::TYPE_REFORM_POLICY:
                $familyPdf = ViewConst::FAMILY_REFORM_PDF;
                break;
            case self::TYPE_REGISTER_POLICY:
                $familyPdf = ViewConst::FAMILY_REGISTER_PDF;
                break;
            default:
                $familyPdf = null;
        }

        return $reformPolicy = ViewConst::FAMILY_PDF_PATH . "/" . $familyPdf;
    }

    /**
     * get member policy type
     */
    public static function getMemberPolicyLink($policy, $policyType)
    {
        switch ($policyType) {
            case self::TYPE_REFORM_POLICY:
                //$memberPdf =  $policy ? $policy->company_cd . "/" . $policy->reform : '';
                $memberPdf = $policy && $policy->regis_license ? $policy->company_cd . "/" . $policy->regis_license : ViewConst::MEMBER_REGISTER_PDF;
                break;
            case self::TYPE_REGISTER_POLICY:
                $memberPdf = $policy && $policy->regis_license ? $policy->company_cd . "/" . $policy->regis_license : ViewConst::MEMBER_REGISTER_PDF;
                break;
            default:
                $policylink = null;
        }

        return $memberPdf ? $reformPolicy = ViewConst::MEMBER_PDF_PATH . "/" . $memberPdf : '';
    }

    /**
     * get policy link
     */
    public static function getPolicyLink($policy, $userType, $policyType)
    {
        if ($userType == User::TYPE_FAMILY) {
            $policylink = self::getFamilyPolicyLink($policyType);
        } else {
            $policylink = self::getMemberPolicyLink($policy, $policyType);
        }

        return $policylink;
    }
}
