<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起企业实名认证4要素校验
 * @author  澄泓
 * @date  2020/12/2 14:12
 */
class OrgFourFactorsByAccount extends EsignRequest implements \JsonSerializable
{
    private $accountId;
    private $agentAccountId;
    private $repetition=true;
    private $contextId;
    private $notifyUrl;
    private $frAuthEnable;

    /**
     * OrgFourFactorsByAccount constructor.
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

    /**
     * @return mixed
     */
    public function getFrAuthEnable()
    {
        return $this->frAuthEnable;
    }

    /**
     * @param mixed $frAuthEnable
     */
    public function setFrAuthEnable($frAuthEnable)
    {
        $this->frAuthEnable = $frAuthEnable;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/organization/enterprise/".$this->accountId."/fourFactors");
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