<?php

use factory\base\Account;
use factory\Factory;

header("Content-type:text/html;charset=utf-8");
include("../eSignOpenAPI.php");
//此示例为创建个人账号和企业账号示例demo,创建账号以后才能进行实名认证
var_dump("--------------------------初始化 start----------------------------");
$host="https://smlopenapi.esign.cn";//请求网关host
$project_id="";//应用id
$project_scert="";//密钥
Factory::init($host,$project_id,$project_scert);
Factory::setDebug(true);//是否开启日志记录，传true或false,日志存放在根目录的phplog.txt文件
//-----------------基础信息初始化 end--------------------------

//-----------------------个人账号信息用于创建个人账号接口传入-----------------------------
$thirdPartyUserIdPsn="123213322332";//thirdPartyUserId参数，用户唯一标识，自定义保持唯一即可
$namePsn="";//name参数，姓名
$idTypePsn="CRED_PSN_CH_IDCARD";//idType参数，证件类型
$idNumberPsn="";//idNumber参数，证件号
$mobilePsn="";//mobile参数，手机号

//------------------------企业账号信息用于创建机构账号接口传入----------------
$thirdPartyUserIdOrg="12123123231132322312";//thirdPartyUserId参数，用户唯一标识，自定义保持唯一即可
$nameOrg="";//name参数，机构名称
$idTypeOrg="CRED_ORG_USCC";//idType参数，证件类型
$idNumberOrg="";//idNumber参数,机构证件号
$orgLegalName="";//法定代表人姓名
$orgLegalIdNumber="";//法人身份证号
var_dump("------------------ 创建个人账号 start ---------------");
$createPsn = Account::createPersonByThirdPartyUserId(
    $thirdPartyUserIdPsn,
    $namePsn,
    $idTypePsn,
    $idNumberPsn);
$createPsn->setMobile($mobilePsn);
$createPsnResp = $createPsn->execute();//execute方法发起请求
$createPsnJson = json_decode($createPsnResp->getBody());
$accountId = $createPsnJson->data->accountId;//生成的个人账号保存好，后续接口调用需要使用
var_dump("------------------ 创建个人账号 end ---------------");


var_dump("------------------ 创建企业账号 start ---------------");
$createOrg1 = Account::createOrganizationsByThirdPartyUserId(
    $thirdPartyUserIdOrg,
    $accountId,
    $nameOrg,
    $idTypeOrg,
    $idNumberOrg
);
$createOrg1->setOrgLegalName($orgLegalName);
$createOrg1->setOrgLegalIdNumber($orgLegalIdNumber);
$createOrg1Resp = $createOrg1->execute();
$createOrg1Json=json_decode($createOrg1Resp->getBody());
$orgId1=$createOrg1Json->data->orgId;
var_dump("------------------ 创建企业账号 end ---------------");
