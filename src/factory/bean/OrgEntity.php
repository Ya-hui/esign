<?php


namespace MrWang\ESign\factory\bean;

/**
 * 实名认证获取组织机构核身地址-orgEntity参数
 * @author  澄泓
 * @date  2020/12/2 14:30
 */
class OrgEntity implements \JsonSerializable
{
    private $name;
    private $certNo;
    private $legalRepCertNo;
    private $legalRepName;
    private $agentName;
    private $agentIdNo;
    private $organizationType;

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
    public function getCertNo()
    {
        return $this->certNo;
    }

    /**
     * @param mixed $certNo
     */
    public function setCertNo($certNo)
    {
        $this->certNo = $certNo;
    }

    /**
     * @return mixed
     */
    public function getLegalRepCertNo()
    {
        return $this->legalRepCertNo;
    }

    /**
     * @param mixed $legalRepCertNo
     */
    public function setLegalRepCertNo($legalRepCertNo)
    {
        $this->legalRepCertNo = $legalRepCertNo;
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
    public function getOrganizationType()
    {
        return $this->organizationType;
    }

    /**
     * @param mixed $organizationType
     */
    public function setOrganizationType($organizationType)
    {
        $this->organizationType = $organizationType;
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