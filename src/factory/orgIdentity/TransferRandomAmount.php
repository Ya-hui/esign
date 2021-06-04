<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起随机金额打款认证
 * @author  澄泓
 * @date  2020/12/2 14:43
 */
class TransferRandomAmount extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $bank;
    private $province;
    private $city;
    private $subbranch;
    private $cardNo;
    private $cnapsCode;
    private $contextId;
    private $notifyUrl;
    private $mobile;

    /**
     * TransferRandomAmount constructor.
     * @param $flowId
     * @param $bank
     * @param $province
     * @param $city
     * @param $subbranch
     * @param $cardNo
     * @param $cnapsCode
     */
    public function __construct($flowId, $bank, $province, $city, $subbranch, $cardNo, $cnapsCode)
    {
        $this->flowId = $flowId;
        $this->bank = $bank;
        $this->province = $province;
        $this->city = $city;
        $this->subbranch = $subbranch;
        $this->cardNo = $cardNo;
        $this->cnapsCode = $cnapsCode;
    }

    /**
     * @return mixed
     */
    public function getFlowId()
    {
        return $this->flowId;
    }

    /**
     * @param mixed $flowId
     */
    public function setFlowId($flowId)
    {
        $this->flowId = $flowId;
    }

    /**
     * @return mixed
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param mixed $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getSubbranch()
    {
        return $this->subbranch;
    }

    /**
     * @param mixed $subbranch
     */
    public function setSubbranch($subbranch)
    {
        $this->subbranch = $subbranch;
    }

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getCnapsCode()
    {
        return $this->cnapsCode;
    }

    /**
     * @param mixed $cnapsCode
     */
    public function setCnapsCode($cnapsCode)
    {
        $this->cnapsCode = $cnapsCode;
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

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/pub/organization/".$this->flowId."/transferRandomAmount");
        $this->setReqType(\HttpEmun::PUT);
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
            if($value===null||$key=='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}