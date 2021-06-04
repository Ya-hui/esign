<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起授权签署核身认证
 * @author  澄泓
 * @date  2020/12/2 14:17
 */
class OrglegalRepSign extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $agentName;
    private $agentIdNo;
    private $mobileNo;
    private $legalRepIdNo;
    private $redirectUrl;

    /**
     * OrglegalRepSign constructor.
     * @param $flowId
     * @param $agentName
     * @param $agentIdNo
     * @param $mobileNo
     */
    public function __construct($flowId, $agentName, $agentIdNo, $mobileNo)
    {
        $this->flowId = $flowId;
        $this->agentName = $agentName;
        $this->agentIdNo = $agentIdNo;
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
    public function getAgentName()
    {
        return $this->agentName;
    }

    /**
     * @param mixed $agentName
     */
    public function setAgentName($agentName)
    {
        $this->agentName = $agentName;
    }

    /**
     * @return mixed
     */
    public function getAgentIdNo()
    {
        return $this->agentIdNo;
    }

    /**
     * @param mixed $agentIdNo
     */
    public function setAgentIdNo($agentIdNo)
    {
        $this->agentIdNo = $agentIdNo;
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
        $this->setUrl("/v2/identity/auth/api/organization/".$this->flowId."/legalRepSign");
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