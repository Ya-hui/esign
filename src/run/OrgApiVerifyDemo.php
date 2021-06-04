<?php

use MrWang\ESign\factory\base\OrgIdentityVerify;
use MrWang\ESign\factory\Factory;

header("Content-type:text/html;charset=utf-8");
include("../eSignOpenAPI.php");
//此示例为企业实名认证API版
var_dump("--------------------------初始化 start----------------------------");
$host="https://smlopenapi.esign.cn";//请求网关host
$project_id="";//应用id
$project_scert="";//密钥
Factory::init($host,$project_id,$project_scert);
Factory::setDebug(true);//是否开启日志记录，传true或false,日志存放在根目录的phplog.txt文件
//-----------------基础信息初始化 end--------------------------

//创建签署账号接口生成的企业账号
$accountId="";//机构账号
$agentAccountId="";//个人账号
$name="";//name参数，机构名称
$orgCode="";//idNumber参数,机构证件号
$legalRepName="";//法人姓名
$legalRepIdNo="";//法人身份证号
$mobileNo="";//手机号

var_dump("-----------------发起企业实名认证4要素校验 start-----------------");
$orgFourFactorsByAccount = OrgIdentityVerify::orgFourFactorsByAccount($accountId, $agentAccountId);
$orgFourFactorsByAccountResp = $orgFourFactorsByAccount->execute();
$orgFourFactorsByAccountJson = json_decode($orgFourFactorsByAccountResp->getBody());
$flowId = $orgFourFactorsByAccountJson->data->flowId;
var_dump("-----------------发起企业实名认证4要素校验 end-----------------");

var_dump("-----------------发起企业核身认证4要素校验 start-----------------");
$orgFourFactors = OrgIdentityVerify::orgFourFactors($name, $orgCode, $legalRepName, $legalRepIdNo);
$orgFourFactorsResp=$orgFourFactors->execute();
$orgFourFactorsJson = json_decode($orgFourFactorsResp->getBody());
$accountId = $orgFourFactorsJson->data->flowId;
var_dump("-----------------发起企业核身认证4要素校验 end-----------------");