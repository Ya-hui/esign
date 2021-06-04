<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起银行4要素实名认证
 * @author  澄泓
 * @date  2020/12/1 11:25
 */
class IndividualBankCard4FactorsByAccount extends EsignRequest implements \JsonSerializable
{
    private $accountId;
    private $mobileNo;
    private $bankCardNo;
    private $repetition=true;
    private $contextId;
    private $notifyUrl;

    /**
     * IndividualBankCard4FactorsByAccount constructor.
     * @param $accountId
     * @param $mobileNo
     * @param $bankCardNo
     */
    public function __construct($accountId, $mobileNo, $bankCardNo)
    {
        $this->accountId = $accountId;
        $this->mobileNo = $mobileNo;
        $this->bankCardNo = $bankCardNo;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
     * @return bool
     */
    public function isRepetition()
    {
        return $this->repetition;
    }

    /**
     * @param bool $repetition
     */
    public function setRepetition($repetition)
    {
        $this->repetition = $repetition;
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
        $this->setUrl("/v2/identity/auth/api/individual/".$this->accountId."/bankCard4Factors");
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
            if($value===null||$key=='accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}