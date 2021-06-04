<?php

use factory\base\OrgIdentityVerify;
use factory\bean\OrgEntity;
use factory\Factory;

header("Content-type:text/html;charset=utf-8");
include("../eSignOpenAPI.php");
//此示例为企业实名认证网页版
var_dump("--------------------------初始化 start----------------------------");
$host="https://smlopenapi.esign.cn";//请求网关host
$project_id="";//应用id
$project_scert="";//密钥
Factory::init($host,$project_id,$project_scert);
Factory::setDebug(true);//是否开启日志记录，传true或false,日志存放在根目录的phplog.txt文件
//-----------------基础信息初始化 end--------------------------

$accountId="";//机构账号
$agentAccountId="";//个人账号
$name="";//name参数，机构名称
$orgCode="";//idNumber参数,机构证件号
var_dump("-----------------获取组织机构实名认证地址 start-----------------");
$orgIdentityUrl = OrgIdentityVerify::orgIdentityUrl($accountId, $agentAccountId);
$orgIdentityUrl->execute();
var_dump("-----------------获取组织机构实名认证地址 end-----------------");


var_dump("-----------------获取组织机构核身地址 start-----------------");
$orgAuthUrl = OrgIdentityVerify::orgAuthUrl();
$orgEntity = new OrgEntity();
$orgEntity->setName($name);
$orgEntity->setCertNo($orgCode);
$orgAuthUrl->setOrgEntity($orgEntity);
$orgAuthUrl->execute();
var_dump("-----------------获取组织机构核身地址 end-----------------");