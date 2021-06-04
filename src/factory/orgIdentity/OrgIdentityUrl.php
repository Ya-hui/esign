<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证获取组织机构实名认证地址
 * @author  澄泓
 * @date  2020/12/2 14:14
 */
class OrgIdentityUrl extends EsignRequest implements \JsonSerializable
{
    private $accountId;
    private $agentAccountId;
    private $authType;
    private $availableAuthTypes;
    private $receiveUrlMobileNo;
    private $contextInfo;
    private $orgEntity;
    private $configParams;
    private $repeatIdentity=true;

    /**
     * OrgIdentityUrl constructor.
     * @param $accountId
     * @param $agentAccountId
     */
    public function __construct($accountId, $agentAccountId)
    {
        $this->accountId = $accountId;
        $this->agentAccountId = $agentAccountId;
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
    public function getAgentAccountId()
    {
        return $this->agentAccountId;
    }

    /**
     * @param mixed $agentAccountId
     */
    public function setAgentAccountId($agentAccountId)
    {
        $this->agentAccountId = $agentAccountId;
    }

    /**
     * @return mixed
     */
    public function getAuthType()
    {
        return $this->authType;
    }

    /**
     * @param mixed $authType
     */
    public function setAuthType($authType)
    {
        $this->authType = $authType;
    }

    /**
     * @return mixed
     */
    public function getAvailableAuthTypes()
    {
        return $this->availableAuthTypes;
    }

    /**
     * @param mixed $availableAuthTypes
     */
    public function setAvailableAuthTypes($availableAuthTypes)
    {
        $this->availableAuthTypes = $availableAuthTypes;
    }

    /**
     * @return mixed
     */
    public function getReceiveUrlMobileNo()
    {
        return $this->receiveUrlMobileNo;
    }

    /**
     * @param mixed $receiveUrlMobileNo
     */
    public function setReceiveUrlMobileNo($receiveUrlMobileNo)
    {
        $this->receiveUrlMobileNo = $receiveUrlMobileNo;
    }

    /**
     * @return mixed
     */
    public function getContextInfo()
    {
        return $this->contextInfo;
    }

    /**
     * @param mixed $contextInfo
     */
    public function setContextInfo($contextInfo)
    {
        $this->contextInfo = $contextInfo;
    }

    /**
     * @return mixed
     */
    public function getOrgEntity()
    {
        return $this->orgEntity;
    }

    /**
     * @param mixed $orgEntity
     */
    public function setOrgEntity($orgEntity)
    {
        $this->orgEntity = $orgEntity;
    }

    /**
     * @return mixed
     */
    public function getConfigParams()
    {
        return $this->configParams;
    }

    /**
     * @param mixed $configParams
     */
    public function setConfigParams($configParams)
    {
        $this->configParams = $configParams;
    }

    /**
     * @return bool
     */
    public function isRepeatIdentity()
    {
        return $this->repeatIdentity;
    }

    /**
     * @param bool $repeatIdentity
     */
    public function setRepeatIdentity($repeatIdentity)
    {
        $this->repeatIdentity = $repeatIdentity;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/web/".$this->accountId."/orgIdentityUrl");
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