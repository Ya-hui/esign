<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起企业核身认证3要素检验
 * @author  澄泓
 * @date  2020/12/2 14:28
 */
class OrgThreeFactors extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $orgCode;
    private $legalRepName;
    private $contextId;
    private $notifyUrl;

    /**
     * OrgThreeFactors constructor.
     * @param $name
     * @param $orgCode
     * @param $legalRepName
     */
    public function __construct($name, $orgCode, $legalRepName)
    {
        $this->name = $name;
        $this->orgCode = $orgCode;
        $this->legalRepName = $legalRepName;
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
    public function getOrgCode()
    {
        return $this->orgCode;
    }

    /**
     * @param mixed $orgCode
     */
    public function setOrgCode($orgCode)
    {
        $this->orgCode = $orgCode;
    }

    /**
     * @return mixed
     */
    public function getLegalRepName()
    {
        return $this->legalRepName;
    }

    /**
     * @param mixed $legalRepName
     */
    public function setLegalRepName($legalRepName)
    {
        $this->legalRepName = $legalRepName;
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
        $this->setUrl("/v2/identity/auth/api/organization/threeFactors");
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