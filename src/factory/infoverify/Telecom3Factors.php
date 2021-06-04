<?php


namespace MrWang\ESign\factory\infoverify;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证个人运营商3要素信息比对
 * @author  澄泓
 * @date  2020/12/2 10:10
 */
class Telecom3Factors extends EsignRequest implements \JsonSerializable
{
    private $idNo;
    private $name;
    private $mobileNo;

    /**
     * Telecom3Factors constructor.
     * @param $idNo
     * @param $name
     * @param $mobileNo
     */
    public function __construct($idNo, $name, $mobileNo)
    {
        $this->idNo = $idNo;
        $this->name = $name;
        $this->mobileNo = $mobileNo;
    }

    /**
     * @return mixed
     */
    public function getIdNo()
    {
        return $this->idNo;
    }

    /**
     * @param mixed $idNo
     */
    public function setIdNo($idNo)
    {
        $this->idNo = $idNo;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMobileNo()
    {
        return $this->mobileNo;
    }

    /**
     * @param mixed $mobileNo
     */
    public function setMobileNo($mobileNo)
    {
        $this->mobileNo = $mobileNo;
    }

    function build()
    {
        $this->setUrl("/v2/identity/verify/organization/enterprise/base");
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