<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起授权签署实名认证
 * @author  澄泓
 * @date  2020/12/2 14:18
 */
class OrglegalRepSignAuth extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $mobileNo;
    private $legalRepIdNo;
    private $redirectUrl;

    /**
     * OrglegalRepSignAuth constructor.
     * @param $flowId
     * @param $mobileNo
     */
    public function __construct($flowId, $mobileNo)
    {
        $this->flowId = $flowId;
        $this->mobileNo = $mobileNo;
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
    public function getLegalRepIdNo()
    {
        return $this->legalRepIdNo;
    }

    /**
     * @param mixed $legalRepIdNo
     */
    public function setLegalRepIdNo($legalRepIdNo)
    {
        $this->legalRepIdNo = $legalRepIdNo;
    }

    /**
     * @return mixed
     */
    public function getRedirectUrl()
    {
        return $this->redirectUrl;
    }

    /**
     * @param mixed $redirectUrl
     */
    public function setRedirectUrl($redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/organization/".$this->flowId."/legalRepSignAuth");
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
            if($value===null||$key=='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}