<?php


namespace MrWang\ESign\factory\bean;

/**
 * 实名认证获取个人实名认证地址-configParams参数
 * @author  澄泓
 * @date  2020/12/1 11:14
 */
class ConfigParams implements \JsonSerializable
{
    private $indivUneditableInfo;
    private $orgUneditableInfo;


    /**
     * @return mixed
     */
    public function getIndivUneditableInfo()
    {
        return $this->indivUneditableInfo;
    }

    /**
     * @param mixed $indivUneditableInfo
     */
    public function setIndivUneditableInfo($indivUneditableInfo)
    {
        $this->indivUneditableInfo = $indivUneditableInfo;
    }

    /**
     * @return mixed
     */
    public function getOrgUneditableInfo()
    {
        return $this->orgUneditableInfo;
    }

    /**
     * @param mixed $orgUneditableInfo
     */
    public function setOrgUneditableInfo($orgUneditableInfo)
    {
        $this->orgUneditableInfo = $orgUneditableInfo;
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