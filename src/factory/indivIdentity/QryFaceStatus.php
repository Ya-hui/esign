<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证查询个人刷脸状态
 * @author  澄泓
 * @date  2020/12/1 11:32
 */
class QryFaceStatus extends EsignRequest implements \JsonSerializable
{
    private $flowId;

    /**
     * QryFaceStatus constructor.
     * @param $flowId
     */
    public function __construct($flowId)
    {
        $this->flowId = $flowId;
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

    function build()
    {
        $this->setUrl("/v2/identity/auth/pub/individual/".$this->flowId."/face");
        $this->setReqType(\HttpEmun::GET);
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