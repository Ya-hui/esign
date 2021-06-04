<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起银行4要素核身认证
 * @author  澄泓
 * @date  2020/12/1 10:37
 */
class IndividualBankCard4Factors extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $certType;
    private $idNo;
    private $mobileNo;
    private $bankCardNo;
    private $contextId;
    private $notifyUrl;

    /**
     * IndividualBankCard4Factors constructor.
     * @param $name
     * @param $certType
     * @param $idNo
     * @param $mobileNo
     * @param $bankCardNo
     */
    public function __construct($name, $certType, $idNo, $mobileNo, $bankCardNo)
    {
        $this->name = $name;
        $this->certType = $certType;
        $this->idNo = $idNo;
        $this->mobileNo = $mobileNo;
        $this->bankCardNo = $bankCardNo;
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
    public function getCertType()
    {
        return $this->certType;
    }

    /**
     * @param mixed $certType
     */
    public function setCertType($certType)
    {
        $this->certType = $certType;
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
    public function getBankCardNo()
    {
        return $this->bankCardNo;
    }

    /**
     * @param mixed $bankCardNo
     */
    public function setBankCardNo($bankCardNo)
    {
        $this->bankCardNo = $bankCardNo;
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
        $this->setUrl("/v2/identity/auth/api/individual/bankCard4Factors");
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