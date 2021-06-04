<?php


namespace MrWang\ESign\factory\base;

use MrWang\ESign\factory\indivIdentity\BankCard4FactorsCodeVerify;
use MrWang\ESign\factory\indivIdentity\FaceIdentity;
use MrWang\ESign\factory\indivIdentity\FaceIdentityByAccount;
use MrWang\ESign\factory\indivIdentity\IndivAuthUrl;
use MrWang\ESign\factory\indivIdentity\IndivIdentityUrl;
use MrWang\ESign\factory\indivIdentity\IndividualBankCard4Factors;
use MrWang\ESign\factory\indivIdentity\IndividualBankCard4FactorsByAccount;
use MrWang\ESign\factory\indivIdentity\IndividualTelecom3Factors;
use MrWang\ESign\factory\indivIdentity\IndividualTelecom3FactorsByAccount;
use MrWang\ESign\factory\indivIdentity\QryFaceStatus;
use MrWang\ESign\factory\indivIdentity\Tel3FactorsCodeVerify;

/**
 * 实名认证个人认证功能类
 *
 * @author  澄泓
 * @date  2020/12/3 10:31
 */
class PsnIdentityVerify
{
    /**
     * 获取个人实名认证地址
     *
     * @param $accountId
     * @return IndivIdentityUrl
     */
    public static function indivIdentityUrl($accountId)
    {
        return new IndivIdentityUrl($accountId);
    }

    /**
     * 获取个人核身认证地址
     *
     * @return IndivAuthUrl
     */
    public static function indivAuthUrl()
    {
        return new IndivAuthUrl();
    }

    /**
     * 发起个人刷脸实名认证
     *
     * @param $accountId
     * @param $faceauthMode
     * @param $callbackUrl
     * @return FaceIdentityByAccount
     */
    public static function faceIdentityByAccount($accountId, $faceauthMode, $callbackUrl)
    {
        return new FaceIdentityByAccount($accountId, $faceauthMode, $callbackUrl);
    }

    /**
     * 发起个人刷脸核身认证
     *
     * @param $name
     * @param $idNo
     * @param $faceauthMode
     * @param $callbackUrl
     * @return FaceIdentity
     */
    public static function faceIdentity($name, $idNo, $faceauthMode, $callbackUrl)
    {
        return new FaceIdentity($name, $idNo, $faceauthMode, $callbackUrl);
    }

    /**
     * 查询个人刷脸状态
     *
     * @param $flowId
     * @return QryFaceStatus
     */
    public static function qryFaceStatus($flowId)
    {
        return new QryFaceStatus($flowId);
    }

    /**
     * 发起运营商3要素实名认证
     *
     * @param $accountId
     * @param $mobileNo
     * @return IndividualTelecom3FactorsByAccount
     */
    public static function individualTelecom3FactorsByAccount($accountId, $mobileNo)
    {
        return new IndividualTelecom3FactorsByAccount($accountId, $mobileNo);
    }

    /**
     * 发起运营商3要素核身认证
     *
     * @param $name
     * @param $idNo
     * @param $mobileNo
     * @return IndividualTelecom3Factors
     */
    public static function individualTelecom3Factors($name, $idNo, $mobileNo)
    {
        return new IndividualTelecom3Factors($name, $idNo, $mobileNo);
    }

    /**
     * 运营商短信验证码校验
     *
     * @param $flowId
     * @param $authcode
     * @return Tel3FactorsCodeVerify
     */
    public static function tel3FactorsCodeVerify($flowId, $authcode)
    {
        return new Tel3FactorsCodeVerify($flowId, $authcode);
    }

    /**
     * 发起银行4要素实名认证
     *
     * @param $accountId
     * @param $mobileNo
     * @param $bankCardNo
     * @return IndividualBankCard4FactorsByAccount
     */
    public static function individualBankCard4FactorsByAccount($accountId, $mobileNo, $bankCardNo)
    {
        return new IndividualBankCard4FactorsByAccount($accountId, $mobileNo, $bankCardNo);
    }

    /**
     * 发起银行4要素核身认证
     *
     * @param $name
     * @param $certType
     * @param $idNo
     * @param $mobileNo
     * @param $bankCardNo
     * @return IndividualBankCard4Factors
     */
    public static function individualBankCard4Factors($name, $certType, $idNo, $mobileNo, $bankCardNo)
    {
        return new IndividualBankCard4Factors($name, $certType, $idNo, $mobileNo, $bankCardNo);
    }

    /**
     * 银行预留手机号验证码校验
     *
     * @param $flowId
     * @param $authcode
     * @return BankCard4FactorsCodeVerify
     */
    public static function bankCard4FactorsCodeVerify($flowId, $authcode)
    {
        return new BankCard4FactorsCodeVerify($flowId, $authcode);
    }
}