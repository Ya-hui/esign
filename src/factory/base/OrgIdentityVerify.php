<?php

namespace MrWang\ESign\factory\base;

use MrWang\ESign\factory\orgIdentity\GetAuthSignUrl;
use MrWang\ESign\factory\orgIdentity\OrgAuthUrl;
use MrWang\ESign\factory\orgIdentity\OrgFourFactors;
use MrWang\ESign\factory\orgIdentity\OrgFourFactorsByAccount;
use MrWang\ESign\factory\orgIdentity\OrgIdentityUrl;
use MrWang\ESign\factory\orgIdentity\OrglegalRepSign;
use MrWang\ESign\factory\orgIdentity\OrglegalRepSignAuth;
use MrWang\ESign\factory\orgIdentity\OrgThreeFactors;
use MrWang\ESign\factory\orgIdentity\OrgThreeFactorsByAccount;
use MrWang\ESign\factory\orgIdentity\QrylegalRepSignResult;
use MrWang\ESign\factory\orgIdentity\QryReversePaymentProcess;
use MrWang\ESign\factory\orgIdentity\QrySubbranch;
use MrWang\ESign\factory\orgIdentity\QryTransferProcess;
use MrWang\ESign\factory\orgIdentity\ReversePayment;
use MrWang\ESign\factory\orgIdentity\TransferRandomAmount;
use MrWang\ESign\factory\orgIdentity\VerifyRandomAmount;

/**
 * 实名认证企业实名认证功能类
 * @author  澄泓
 * @date  2020/12/3 10:19
 */
class OrgIdentityVerify
{
    /**
     * 实名认证获取组织机构实名认证地址
     * @param $accountId
     * @param $agentAccountId
     * @return OrgIdentityUrl
     */
    public static function orgIdentityUrl($accountId, $agentAccountId){
        return new OrgIdentityUrl($accountId, $agentAccountId);
    }

    /**
     * 获取组织机构核身地址
     * @return OrgAuthUrl
     */
    public static function orgAuthUrl(){
        return new OrgAuthUrl();
    }

    /**
     * 实名认证发起企业核身认证4要素校验
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     * @param $legalRepIdNo
     * @return OrgFourFactors
     */
    public static function orgFourFactors($name, $orgCode, $legalRepName, $legalRepIdNo){
        return new OrgFourFactors($name, $orgCode, $legalRepName, $legalRepIdNo);
    }

    /**
     * 实名认证发起企业实名认证4要素校验
     * @param $accountId
     * @param $agentAccountId
     * @return OrgFourFactorsByAccount
     */
    public static function orgFourFactorsByAccount($accountId, $agentAccountId){
        return new OrgFourFactorsByAccount($accountId, $agentAccountId);
    }

    /**
     * 发起企业实名认证3要素校验
     * @param $accountId
     * @param $agentAccountId
     * @return OrgThreeFactorsByAccount
     */
    public static function orgThreeFactorsByAccount($accountId, $agentAccountId){
        return new OrgThreeFactorsByAccount($accountId, $agentAccountId);
    }

    /**
     * 发起企业核身认证3要素检验
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     * @return OrgThreeFactors
     */
    public static function orgThreeFactors($name, $orgCode, $legalRepName){
        return new OrgThreeFactors($name, $orgCode, $legalRepName);
    }

    /**
     * 发起授权签署实名认证
     * @param $flowId
     * @param $mobileNo
     * @return OrglegalRepSignAuth
     */
    public static function orglegalRepSignAuth($flowId, $mobileNo){
        return new OrglegalRepSignAuth($flowId, $mobileNo);
    }

    /**
     * 发起授权签署核身认证
     * @param $flowId
     * @param $agentName
     * @param $agentIdNo
     * @param $mobileNo
     * @return OrglegalRepSign
     */
    public static function orglegalRepSign($flowId, $agentName, $agentIdNo, $mobileNo){
        return new OrglegalRepSign($flowId, $agentName, $agentIdNo, $mobileNo);
    }

    /**
     * 查询授权书签署状态
     * @param $flowId
     * @return QrylegalRepSignResult
     */
    public static function qrylegalRepSignResult($flowId){
        return new QrylegalRepSignResult($flowId);
    }

    /**
     * 实名认证获取授权签署链接
     * @param $flowId
     * @return GetAuthSignUrl
     */
    public static function getAuthSignUrl($flowId){
        return new GetAuthSignUrl($flowId);
    }

    /**
     * 发起随机金额打款认证
     * @param $flowId
     * @param $bank
     * @param $province
     * @param $city
     * @param $subbranch
     * @param $cardNo
     * @param $cnapsCode
     * @return TransferRandomAmount
     */
    public static function transferRandomAmount($flowId, $bank, $province, $city, $subbranch, $cardNo, $cnapsCode){
        return new TransferRandomAmount($flowId, $bank, $province, $city, $subbranch, $cardNo, $cnapsCode);
    }

    /**
     * 随机金额校验
     * @param $flowId
     * @param $amount
     * @return VerifyRandomAmount
     */
    public static function verifyRandomAmount($flowId, $amount){
        return new VerifyRandomAmount($flowId, $amount);
    }

    /**
     * 查询随机金额打款进度
     * @param $flowId
     * @return QryTransferProcess
     */
    public static function qryTransferProcess($flowId){
        return new QryTransferProcess($flowId);
    }

    /**
     * 发起企业反向打款认证
     * @param $flowId
     * @return ReversePayment
     */
    public static function reversePayment($flowId){
        return new ReversePayment($flowId);
    }

    /**
     * 查询反向打款进度
     * @param $flowId
     * @return QryReversePaymentProcess
     */
    public static function qryReversePaymentProcess($flowId){
        return new QryReversePaymentProcess($flowId);
    }

    /**
     * 查询打款银行信息
     * @param $flowId
     * @param $keyWord
     * @return QrySubbranch
     */
    public static function qrySubbranch($flowId, $keyWord){
        return new QrySubbranch($flowId, $keyWord);
    }
}