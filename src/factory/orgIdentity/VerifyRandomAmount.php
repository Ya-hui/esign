<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证随机金额校验
 * @author  澄泓
 * @date  2020/12/2 14:45
 */
class VerifyRandomAmount extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $amount;

    /**
     * VerifyRandomAmount constructor.
     * @param $flowId
     * @param $amount
     */
    public function __construct($flowId, $amount)
    {
        $this->flowId = $flowId;
        $this->amount = $amount;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/pub/organization/".$this->flowId."/verifyRandomAmount");
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