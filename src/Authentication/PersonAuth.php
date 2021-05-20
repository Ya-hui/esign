<?php


namespace Achais\ESign\Authentication;


use Achais\ESign\Core\AbstractAPI;

class PersonAuth extends AbstractAPI
{
    /**
     * 个人2要素信息比对
     *
     * @param $name
     * @param $idNumber
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function twoFactors($name, $idNumber)
    {
        $url    = '/v2/identity/verify/individual/base';
        $params = [
            'name' => $name,
            'idNo' => $idNumber
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 发起个人刷脸核身认证
     *
     * @param $name
     * @param $idNumber
     * @param $callbackUrl
     * @param $notifyUrl
     * @param $contextId
     * @param  string  $faceauthMode
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function face($name, $idNumber, $callbackUrl, $notifyUrl, $contextId, $faceauthMode = 'ESIGN')
    {
        $url    = '/v2/identity/auth/api/individual/face';
        $params = [
            'name'         => $name,
            'idNo'         => $idNumber,
            'contextId'    => $contextId,
            'callbackUrl'  => $callbackUrl,
            'notifyUrl'    => $notifyUrl,
            'faceauthMode' => $faceauthMode
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}