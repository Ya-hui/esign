<?php


namespace MrWang\ESign\factory\ocr;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证身份证OCR
 * @author  澄泓
 * @date  2020/12/2 10:20
 */
class Idcard extends EsignRequest implements \JsonSerializable
{
    private $infoImg;
    private $emblemImg;

    /**
     * Idcard constructor.
     * @param $infoImg
     */
    public function __construct($infoImg)
    {
        $this->infoImg = $infoImg;
    }

    /**
     * @return mixed
     */
    public function getInfoImg()
    {
        return $this->infoImg;
    }

    /**
     * @param mixed $infoImg
     */
    public function setInfoImg($infoImg)
    {
        $this->infoImg = $infoImg;
    }

    /**
     * @return mixed
     */
    public function getEmblemImg()
    {
        return $this->emblemImg;
    }

    /**
     * @param mixed $emblemImg
     */
    public function setEmblemImg($emblemImg)
    {
        $this->emblemImg = $emblemImg;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/ocr/idcard");
        $this->setReqType(\HttpEmun::POST);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        $json = array();
        foreach ($this as $key => $value) {
            if($value===null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}