<?php

use factory\base\PsnIdentityVerify;
use factory\Factory;

header("Content-type:text/html;charset=utf-8");
include("../eSignOpenAPI.php");
//此示例为个人实名认证网页版
var_dump("--------------------------初始化 start----------------------------");
$host="https://smlopenapi.esign.cn";//请求网关host
$project_id="";//应用id
$project_scert="";//密钥
Factory::init($host,$project_id,$project_scert);
Factory::setDebug(true);//是否开启日志记录，传true或false,日志存放在根目录的phplog.txt文件
//-----------------基础信息初始化 end--------------------------

$accountId="";//个人账号
//var_dump("-----------------获取个人实名认证地址 start-----------------");
//$indivIdentityUrl = PsnIdentityVerify::indivIdentityUrl($accountId);
//$indivIdentityUrl->setRepeatIdentity(false);
//$indivIdentityUrlResponse = $indivIdentityUrl->execute();
//$indivIdentityUrlJson = json_decode($indivIdentityUrlResponse->getBody());
//$flowId = $indivIdentityUrlJson->data->shortLink;
//var_dump("-----------------获取个人实名认证地址 end-----------------");

var_dump("-----------------获取个人核身认证地址 start-----------------");
$indivAuthUrl = PsnIdentityVerify::indivAuthUrl();
$indivAuthUrlResponse = $indivAuthUrl->execute();
var_dump("-----------------获取个人核身认证地址 end-----------------");