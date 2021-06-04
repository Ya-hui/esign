<?php


namespace MrWang\ESign\factory\infoverify;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证企业2要素信息比对
 * @author  澄泓
 * @date  2020/12/2 9:58
 */
class EntBase extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $orgCode;

    /**
     * EntBase constructor.
     * @param $name
     * @param $orgCode
     */
    public function __construct($name, $orgCode)
    {
        $this->name = $name;
        $this->orgCode = $orgCode;
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

    function build()
    {
        $this->setUrl("/v2/identity/verify/organization/enterprise/base");
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