<?php
namespace MrWang\ESign\factory\ocr;
use MrWang\ESign\factory\request\EsignRequest;

/**
 * 实名认证银行卡OCR
 * @author  澄泓
 * @date  2020/12/2 10:12
 */
class Bankcard extends EsignRequest implements \JsonSerializable
{
    private $img;

    /**
     * Bankcard constructor.
     * @param $img
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    function build()
    {
        $this->setUrl("/v2/identity/auth/api/ocr/bankcard");
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