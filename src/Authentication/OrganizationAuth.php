<?php


namespace Achais\ESign\Authentication;


use Achais\ESign\Core\AbstractAPI;

class OrganizationAuth extends AbstractAPI
{
    /**
     * 发起企业核身认证3要素检验
     *
     * @param $name string 企业名称
     * @param $orgCode string 组织机构证件号,支持统一社会信用代码号和工商注册号（部分个体工商户）
     * @param $legalRepName string 法定代表人名称
     * @param $contextId string|integer 对接方业务上下文id，将在异步通知及跳转时携带返回对接方
     * @param $notifyUrl string 认证结束后异步通知地址
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function threeFactors(
        $name,
        $orgCode,
        $legalRepName,
        $contextId,
        $notifyUrl
    ) {
        $url    = '/v2/identity/auth/api/organization/threeFactors';
        $params = [
            'name'         => $name,
            'orgCode'      => $orgCode,
            'contextId'    => $contextId,
            'legalRepName' => $legalRepName,
            'notifyUrl'    => $notifyUrl
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 发起企业核身认证4要素校验
     *
     * @param $name string 企业名称
     * @param $orgCode string 组织机构证件号,支持统一社会信用代码号和工商注册号（部分个体工商户）
     * @param $legalRepName string 法定代表人名称
     * @param $legalRepIdNo string 法定代表人证件号
     * @param $contextId string|integer 对接方业务上下文id，将在异步通知及跳转时携带返回对接方
     * @param $notifyUrl string 认证结束后异步通知地址
     * @param  string  $legalRepCertType  法人证件类型 具体可参考 https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fikp0qg&namespace=opendoc%2Fidentity_service
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function fourFactors(
        $name,
        $orgCode,
        $legalRepName,
        $legalRepIdNo,
        $contextId,
        $notifyUrl,
        $legalRepCertType = 'INDIVIDUAL_CH_IDCARD'
    ) {
        $url    = '/v2/identity/auth/api/organization/enterprise/fourFactors';
        $params = [
            'name'             => $name,
            'orgCode'          => $orgCode,
            'contextId'        => $contextId,
            'legalRepName'     => $legalRepName,
            'notifyUrl'        => $notifyUrl,
            'legalRepCertType' => $legalRepCertType,
            'legalRepIdNo'     => $legalRepIdNo
        ];

        return $this->parseJSON('json', [$url, $params]);
    }


    /**
     * 发起授权签署核身认证
     *
     * @param $flowId
     * @param $agentName string 当前实名认证办理人姓名
     * @param $agentIdNo string 当前实名认证办理人证件号（仅支持大陆二代身份证）
     * @param $mobileNo string 法定代表人手机号，用于签署电子授权书
     * @param $legalRepIdNo string 法定代表人身份证号,如果信息比对api中已传入，可为空；否则需传入
     * @param $redirectUrl string 法定代表人签署完成后，重定向跳转地址
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fdyyohd&namespace=opendoc%2Fidentity_service
     */
    public function legalRepSign($flowId, $agentName, $agentIdNo, $mobileNo, $legalRepIdNo, $redirectUrl)
    {
        $url    = "/v2/identity/auth/api/organization/{$flowId}/legalRepSign";
        $params = [
            'agentName'    => $agentName,
            'agentIdNo'    => $agentIdNo,
            'mobileNo'     => $mobileNo,
            'legalRepIdNo' => $legalRepIdNo,
            'redirectUrl'  => $redirectUrl
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 获取授权签署链接
     *
     * @param $flowId
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fcgiwtx&namespace=opendoc%2Fidentity_service
     */
    public function signUrl($flowId)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/signUrl";

        return $this->parseJSON('json', [$url]);
    }

    /**
     * 查询授权书签署状态
     *
     * @param $flowId
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fih16c4&namespace=opendoc%2Fidentity_service
     */
    public function legalRepSignResult($flowId)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/legalRepSignResult";

        return $this->parseJSON('json', [$url]);
    }

    /**
     * 发起随机金额打款认证
     *
     * @param $flowId
     * @param $bank string 对公账号开户行总行名称
     * @param $province string 对公账号开户行所在省份名称
     * @param $city string 对公账号开户行所在城市名称
     * @param $subbranch string 对公账号开户行支行名称全称
     * @param $cardNo
     * @param $cnapsCode string 联行号
     * @param $notifyUrl
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function transferRandomAmount($flowId, $bank, $province, $city, $subbranch, $cardNo, $cnapsCode, $notifyUrl)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/transferRandomAmount";

        $params = [
            'bank'      => $bank,
            'province'  => $province,
            'city'      => $city,
            'subbranch' => $subbranch,
            'cardNo'    => $cardNo,
            'cnapsCode' => $cnapsCode,
            'notifyUrl' => $notifyUrl
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 查询打款进度状态
     *
     * @param $flowId
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Flrwgm0&namespace=opendoc%2Fidentity_service
     */
    public function transferProcess($flowId)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/transferProcess";

        return $this->parseJSON('json', [$url]);
    }

    /**
     * 回填对公账号打款随机金额进行校验
     *
     * @param $flowId
     * @param $amount
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fovy1ml&namespace=opendoc%2Fidentity_service
     */
    public function verifyRandomAmount($flowId, $amount)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/verifyRandomAmount";

        $params = [
            'amount' => $amount,
        ];

        return $this->parseJSON('json', [$url, $params]);
    }

    /**
     * 查询打款银行信息
     *
     * @param $flowId
     * @param $keyWord string 银行名称搜索关键字，建议输入完整的银行名称
     * @link https://open.esign.cn/doc/detail?id=opendoc%2Fidentity_service%2Fduv6iv&namespace=opendoc%2Fidentity_service
     * @return \Achais\ESign\Support\Collection|null
     * @throws \Achais\ESign\Exceptions\HttpException
     */
    public function subbranch($flowId, $keyWord)
    {
        $url = "/v2/identity/auth/pub/organization/{$flowId}/subbranch";

        $params = [
            'keyWord' => $keyWord
        ];

        return $this->parseJSON('json', [$url, $params]);
    }
}