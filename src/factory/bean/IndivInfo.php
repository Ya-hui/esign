<?php


namespace MrWang\ESign\factory\bean;

/**
 * 实名认证获取个人实名认证地址-indivInfo参数
 * @author  澄泓
 * @date  2020/12/1 11:11
 */
class IndivInfo implements \JsonSerializable
{
    private $bankCardNo;
    private $certNo;
    private $certType;
    private $mobileNo;
    private $name;
    private $nationality;

    /**
     * @return mixed
     */
    public function getBankCardNo()
    {
        return $this->bankCardNo;
    }

    /**
     * @param mixed $bankCardNo
     */
    public function setBankCardNo($bankCardNo)
    {
        $this->bankCardNo = $bankCardNo;
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
    public function getCertType()
    {
        return $this->certType;
    }

    /**
     * @param mixed $certType
     */
    public function setCertType($certType)
    {
        $this->certType = $certType;
    }

    /**
     * @return mixed
     */
    public function getMobileNo()
    {
        return $this->mobileNo;
    }

    /**
     * @param mixed $mobileNo
     */
    public function setMobileNo($mobileNo)
    {
        $this->mobileNo = $mobileNo;
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
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
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