<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证发起个人刷脸核身认证
 * @author  澄泓
 * @date  2020/11/30 10:35
 */
class FaceIdentity extends EsignRequest implements \JsonSerializable
{
    private $name;
    private $idNo;
    private $faceauthMode;
    private $callbackUrl;
    private $contextId;
    private $notifyUrl;

    /**
     * FaceIdentity constructor.
     * @param $name
     * @param $idNo
     * @param $faceauthMode
     * @param $callbackUrl
     */
    public function __construct($name, $idNo, $faceauthMode, $callbackUrl)
    {
        $this->name = $name;
        $this->idNo = $idNo;
        $this->faceauthMode = $faceauthMode;
        $this->callbackUrl = $callbackUrl;
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
    public function getFaceauthMode()
    {
        return $this->faceauthMode;
    }

    /**
     * @param mixed $faceauthMode
     */
    public function setFaceauthMode($faceauthMode)
    {
        $this->faceauthMode = $faceauthMode;
    }

    /**
     * @return mixed
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param mixed $callbackUrl
     */
    public function setCallbackUrl($callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
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

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/individual/face");
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
            if($value==null) {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}