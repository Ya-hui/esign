<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证获取个人核身认证地址
 * @author  澄泓
 * @date  2020/11/30 10:47
 */
class IndivAuthUrl extends EsignRequest implements \JsonSerializable
{
    private $authType;
    private $availableAuthTypes;
    private $receiveUrlMobileNo;
    private $contextInfo;
    private $indivInfo;
    private $configParams;

    /**
     * IndivAuthUrl constructor.
     */
    public function __construct(){}

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
    public function getIndivInfo()
    {
        return $this->indivInfo;
    }

    /**
     * @param mixed $indivInfo
     */
    public function setIndivInfo($indivInfo)
    {
        $this->indivInfo = $indivInfo;
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


    function build()
    {
        $this->setUrl("/v2/identity/auth/web/indivAuthUrl");
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