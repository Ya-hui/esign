<?php


namespace MrWang\ESign\factory\ocr;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证行驶证OCR
 * @author  澄泓
 * @date  2020/12/2 10:18
 */
class DrivingPermit extends EsignRequest implements \JsonSerializable
{
    private $image;
    private $requestId;

    /**
     * DrivingPermit constructor.
     * @param $image
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param mixed $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/ocr/drivingPermit");
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