<?php
namespace MrWang\ESign\factory\indivIdentity;
use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证银行预留手机号验证码校验
 * @author  澄泓
 * @date  2020/11/30 10:00
 */
class BankCard4FactorsCodeVerify extends EsignRequest implements \JsonSerializable
{
    private $flowId;
    private $authcode;

    /**
     * BankCard4FactorsCodeVerify constructor.
     * @param $flowId
     * @param $authcode
     */
    public function __construct($flowId, $authcode)
    {
        $this->flowId = $flowId;
        $this->authcode = $authcode;
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
    public function getAuthcode()
    {
        return $this->authcode;
    }

    /**
     * @param mixed $authcode
     */
    public function setAuthcode($authcode)
    {
        $this->authcode = $authcode;
    }


    function build()
    {
        $this->setUrl("/v2/identity/auth/pub/individual/".$this->flowId."/bankCard4Factors");
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
            if($value==null||$key='flowId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}