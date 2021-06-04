<?php

namespace MrWang\ESign\factory\infoverify;
use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证个人银行卡3要素信息比对
 * @author  澄泓
 * @date  2020/12/1 11:40
 */
class Bank3Factors extends EsignRequest implements \JsonSerializable
{
    private $idNo;
    private $name;
    private $cardNo;

    /**
     * Bank3Factors constructor.
     * @param $idNo
     * @param $name
     * @param $cardNo
     */
    public function __construct($idNo, $name, $cardNo)
    {
        $this->idNo = $idNo;
        $this->name = $name;
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getIdNo()
    {
        return $this->idNo;
    }

    /**
     * @param mixed $idNo
     */
    public function setIdNo($idNo)
    {
        $this->idNo = $idNo;
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
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    function build()
    {
        $this->setUrl("/v2/identity/verify/individual/bank3Factors");
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