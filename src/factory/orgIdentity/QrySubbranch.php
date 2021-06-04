<?php


namespace MrWang\ESign\factory\orgIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证查询打款银行信息
 * @author  澄泓
 * @date  2020/12/2 14:39
 */
class QrySubbranch extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $keyWord;

    /**
     * QrySubbranch constructor.
     * @param $flowId
     * @param $keyWord
     */
    public function __construct($flowId, $keyWord)
    {
        $this->flowId = $flowId;
        $this->keyWord = $keyWord;
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
    public function getKeyWord()
    {
        return $this->keyWord;
    }

    /**
     * @param mixed $keyWord
     */
    public function setKeyWord($keyWord)
    {
        $this->keyWord = $keyWord;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/pub/organization/".$this->flowId."/subbranch");
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