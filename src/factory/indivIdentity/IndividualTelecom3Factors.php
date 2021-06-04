<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起运营商3要素核身认证
 * @author  澄泓
 * @date  2020/12/1 11:28
 */
class IndividualTelecom3Factors extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $idNo;
    private $mobileNo;
    private $contextId;
    private $notifyUrl;

    /**
     * IndividualTelecom3Factors constructor.
     * @param $name
     * @param $idNo
     * @param $mobileNo
     */
    public function __construct($name, $idNo, $mobileNo)
    {
        $this->name = $name;
        $this->idNo = $idNo;
        $this->mobileNo = $mobileNo;
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

    /**
     * @return mixed
     */
    public function getContextId()
    {
        return $this->contextId;
    }

    /**
     * @param mixed $contextId
     */
    public function setContextId($contextId)
    {
        $this->contextId = $contextId;
    }

    /**
     * @return mixed
     */
    public function getNotifyUrl()
    {
        return $this->notifyUrl;
    }

    /**
     * @param mixed $notifyUrl
     */
    public function setNotifyUrl($notifyUrl)
    {
        $this->notifyUrl = $notifyUrl;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/individual/telecom3Factors");
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