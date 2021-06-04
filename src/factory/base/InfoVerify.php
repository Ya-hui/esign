<?php


namespace MrWang\ESign\factory\base;

use MrWang\ESign\factory\infoverify\Bank3Factors;
use MrWang\ESign\factory\infoverify\Bank4Factors;
use MrWang\ESign\factory\infoverify\Bureau3Factors;
use MrWang\ESign\factory\infoverify\Bureau4Factors;
use MrWang\ESign\factory\infoverify\EntBase;
use MrWang\ESign\factory\infoverify\IndividualBase;
use MrWang\ESign\factory\infoverify\LawFirm;
use MrWang\ESign\factory\infoverify\OrgVerify;
use MrWang\ESign\factory\infoverify\Social;
use MrWang\ESign\factory\infoverify\Telecom3Factors;

/**
 * 实名认证信息比对功能类
 * @author  澄泓
 * @date  2020/12/3 9:56
 */
class InfoVerify
{
    /**
     * 个人2要素信息比对
     * @param $idNo
     * @param $name
     * @return IndividualBase
     */
    public static function individualBase($idNo,$name){
        return new IndividualBase($idNo,$name);
    }

    /**
     * 个人运营商3要素信息比对
     * @param $idNo
     * @param $name
     * @param $mobileNo
     * @return Telecom3Factors
     */
    public static function telecom3Factors($idNo, $name, $mobileNo){
        return new Telecom3Factors($idNo, $name, $mobileNo);
    }

    /**
     * 个人银行卡3要素信息比对
     * @param $idNo
     * @param $name
     * @param $cardNo
     * @return Bank3Factors
     */
    public static function bank3Factors($idNo, $name, $cardNo){
        return new Bank3Factors($idNo, $name, $cardNo);
    }

    /**
     * 个人银行卡4要素信息比对
     * @param $idNo
     * @param $name
     * @param $cardNo
     * @param $mobileNo
     * @return Bank4Factors
     */
    public static function bank4Factors($idNo, $name, $cardNo, $mobileNo){
        return new Bank4Factors($idNo,$name,$cardNo,$mobileNo);
    }

    /**
     * 企业2要素信息比对
     * @param $name
     * @param $orgCode
     * @return EntBase
     */
    public static function entBase($name, $orgCode){
        return new EntBase($name, $orgCode);
    }

    /**
     * 企业3要素信息比对
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     * @return Bureau3Factors
     */
    public static function bureau3Factors($name, $orgCode, $legalRepName){
        return new Bureau3Factors($name, $orgCode, $legalRepName);
    }

    /**
     * 企业4要素信息比对
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     * @param $legalRepCertNo
     * @return Bureau4Factors
     */
    public static function bureau4Factors($name, $orgCode, $legalRepName, $legalRepCertNo){
        return new Bureau4Factors($name, $orgCode, $legalRepName, $legalRepCertNo);
    }

    /**
     * 律所3要素信息比对
     * @param $name
     * @param $codeUSC
     * @param $legalRepName
     * @return LawFirm
     */
    public static function lawFirm($name, $codeUSC, $legalRepName){
        return new LawFirm($name, $codeUSC, $legalRepName);
    }

    /**
     * 组织机构3要素信息比对
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     * @return OrgVerify
     */
    public static function orgVerify($name, $orgCode, $legalRepName){
        return new OrgVerify($name, $orgCode, $legalRepName);
    }

    /**
     * 非工商组织3要素信息比对
     * @param $name
     * @param $codeUSC
     * @param $legalRepName
     * @return Social
     */
    public static function social($name, $codeUSC, $legalRepName){
        return new Social($name, $codeUSC, $legalRepName);
    }
}