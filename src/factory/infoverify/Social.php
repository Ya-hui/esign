<?php


namespace MrWang\ESign\factory\infoverify;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 悟空API
 * @author  澄泓
 * @date  2020/12/2 10:09
 */
class Social extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $codeUSC;
    private $legalRepName;

    /**
     * Social constructor.
     * @param $name
     * @param $codeUSC
     * @param $legalRepName
     */
    public function __construct($name, $codeUSC, $legalRepName)
    {
        $this->name = $name;
        $this->codeUSC = $codeUSC;
        $this->legalRepName = $legalRepName;
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
    public function getCodeUSC()
    {
        return $this->codeUSC;
    }

    /**
     * @param mixed $codeUSC
     */
    public function setCodeUSC($codeUSC)
    {
        $this->codeUSC = $codeUSC;
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

    function build()
    {
        $this->setUrl("/v2/identity/verify/organization/social");
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