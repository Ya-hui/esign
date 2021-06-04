<?php

use MrWang\Esign\factory\base\PsnIdentityVerify;
use MrWang\Esign\factory\Factory;

header("Content-type:text/html;charset=utf-8");
include("../eSignOpenAPI.php");
//此示例为个人实名认证API版
var_dump("--------------------------初始化 start----------------------------");
$host="https://smlopenapi.esign.cn";//请求网关host
$project_id="";//应用id
$project_scert="";//密钥
Factory::init($host,$project_id,$project_scert);
Factory::setDebug(true);//是否开启日志记录，传true或false,日志存放在根目录的phplog.txt文件
//-----------------基础信息初始化 end--------------------------

//签署账号创建接口生成的account_Id
$accountId="";//个人账号
//认证完成以后前端需要跳转的页面地址
$callbackUrl="https://open.esign.cn";
$mobileNo="";//手机号
$name="";//姓名
$idNo="";//身份证号
$bankCardNo="";//银行卡号
var_dump("-----------------发起个人刷脸实名认证 start-----------------");
$faceIdentityByAccount = PsnIdentityVerify::faceIdentityByAccount($accountId,"TENCENT",$callbackUrl);
$faceByActResponse= $faceIdentityByAccount->execute();
$faceByActJson = json_decode($faceByActResponse->getBody());
$flowId=$faceByActJson->data->flowId;
var_dump("-----------------发起个人刷脸实名认证 end-----------------");


var_dump("-----------------查询个人刷脸状态 start-----------------");
$qryFaceStatus = PsnIdentityVerify::qryFaceStatus($flowId);
$qryFaceStatus->execute();
var_dump("-----------------查询个人刷脸状态 end-----------------");


var_dump("-----------------发起运营商3要素实名认证 start-----------------");
$telecom3FactorsByAccount = PsnIdentityVerify::individualTelecom3FactorsByAccount($accountId, $mobileNo);
$telecom3FactorsByAccountResponse = $telecom3FactorsByAccount->execute();
$telecom3FactorsByAccountJson = json_decode($telecom3FactorsByAccountResponse->getBody());
$flowId = $telecom3FactorsByAccountJson->data->flowId;
var_dump("-----------------发起运营商3要素实名认证 end-----------------");

var_dump("-----------------发起运营商3要素核身认证 start-----------------");
$telecom3Factors = PsnIdentityVerify::individualTelecom3Factors($name, $idNo, $mobileNo);
$telecom3Factors->execute();
var_dump("-----------------发起运营商3要素核身认证 end-----------------");

var_dump("-----------------运营商短信验证码校验 start-----------------");
$authCode="";//发起运营商三要素以后收到的短信验证码
$tel3FactorsCodeVerify = PsnIdentityVerify::tel3FactorsCodeVerify($flowId, $authCode);
$tel3FactorsCodeVerify->execute();
var_dump("-----------------运营商短信验证码校验 end-----------------");

var_dump("-----------------发起银行4要素实名认证 start-----------------");
$bankCard4FactorsByAccount = PsnIdentityVerify::individualBankCard4FactorsByAccount($accountId, $mobileNo, $bankCardNo);
$bankResponse = $bankCard4FactorsByAccount->execute();
$bankJson = json_decode($bankResponse->getBody());
$flowId = $bankJson->data->flowId;
var_dump("-----------------发起银行4要素实名认证 end-----------------");

var_dump("-----------------发起银行4要素核身认证 start-----------------");
$bankCard4Factors = PsnIdentityVerify::individualBankCard4Factors($name, "INDIVIDUAL_CH_IDCARD", $idNo,$mobileNo, $bankCardNo);
$bankCard4Factors->execute();
var_dump("-----------------发起银行4要素核身认证 end-----------------");


var_dump("-----------------银行预留手机号验证码校验 start-----------------");
$authCode="";//发起银行卡四要素以后手机收到的短信验证码
$bankCard4FactorsCodeVerify = PsnIdentityVerify::bankCard4FactorsCodeVerify($flowId, $authCode);
$bankCard4FactorsCodeVerify->execute();
var_dump("-----------------银行预留手机号验证码校验 end-----------------");