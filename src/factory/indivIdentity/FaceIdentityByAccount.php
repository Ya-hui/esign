<?php


namespace MrWang\ESign\factory\indivIdentity;

use MrWang\ESign\emun\HttpEmun;

use MrWang\ESign\factory\request\EsignRequest;


/**
 * 悟空API
 * @author  澄泓
 * @date  2020/11/30 10:41
 */
class FaceIdentityByAccount extends EsignRequest implements \JsonSerializable
{
    private $accountId;
    private $faceauthMode;
    private $repetition=true;
    private $callbackUrl;
    private $contextId;
    private $notifyUrl;

    /**
     * FaceIdentityByAccount constructor.
     * @param $accountId
     * @param $faceauthMode
     * @param $callbackUrl
     */
    public function __construct($accountId, $faceauthMode, $callbackUrl)
    {
        $this->accountId = $accountId;
        $this->faceauthMode = $faceauthMode;
        $this->callbackUrl = $callbackUrl;
    }

    /**
     * @return mixed
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param mixed $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
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
     * @return bool
     */
    public function isRepetition()
    {
        return $this->repetition;
    }

    /**
     * @param bool $repetition
     */
    public function setRepetition($repetition)
    {
        $this->repetition = $repetition;
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
        $this->setUrl("/v2/identity/auth/api/individual/".$this->accountId."/face");
        $this->setReqType(HttpEmun::POST);
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
            if($value===null||$key=='accountId') {
                continue;
            }
            $json[$key] = $value;
        }
        return $json;
    }
}