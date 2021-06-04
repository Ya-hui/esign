<?php


namespace MrWang\ESign\factory\base;

use MrWang\ESign\factory\ocr\Bankcard;
use MrWang\ESign\factory\ocr\DrivingLicence;
use MrWang\ESign\factory\ocr\DrivingPermit;
use MrWang\ESign\factory\ocr\Idcard;
use MrWang\ESign\factory\ocr\License;

/**
 * 实名认证OCR接口功能类
 * @author  澄泓
 * @date  2020/12/3 10:12
 */
class Ocr
{
    /**
     * 身份证OCR
     * @param $infoImg
     * @return Idcard
     */
    public static function idcard($infoImg){
        return new Idcard($infoImg);
    }

    /**
     * 银行卡OCR
     * @param $img
     * @return Bankcard
     */
    public static function bankcard($img){
        return new Bankcard($img);
    }

    /**
     * 营业执照OCR
     * @param $img
     * @return License
     */
    public static function license($img){
        return new License($img);
    }

    /**
     * 驾驶证OCR
     * @param $image
     * @return DrivingLicence
     */
    public static function drivingLicence($image){
        return new DrivingLicence($image);
    }

    /**
     * 行驶证OCR
     * @param $image
     * @return DrivingPermit
     */
    public static function drivingPermit($image){
        return new DrivingPermit($image);
    }
}