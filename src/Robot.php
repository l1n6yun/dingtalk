<?php

namespace l1n6yun\DingTalk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use l1n6yun\DingTalk\Exceptions\BusinessExceptions;

class Robot
{
    /**
     * 访问令牌
     * @var string
     */
    protected string $accessToken;

    /**
     * 加签
     */
    protected ?string $secret;

    /**
     * @param string $accessToken 访问令牌
     * @param null $secret 加签
     */
    public function __construct(string $accessToken, $secret = null)
    {
        $this->accessToken = $accessToken;
        $this->secret = $secret;
    }

    /**
     * @param string $accessToken 访问令牌
     * @param null $secret 加签
     */
    public static function create(string $accessToken, $secret = null): Robot
    {
        return new static($accessToken, $secret);
    }

    /**
     * 发送消息
     * @param array $message
     * @return mixed
     * @throws BusinessExceptions
     * @throws GuzzleException
     */
    public function send(array $message)
    {
        $url = 'https://oapi.dingtalk.com/robot/send?access_token=' . $this->accessToken;

        if ($this->secret) {
            $timestamp = time() . '000';
            $url .= sprintf(
                '&sign=%s&timestamp=%s',
                urlencode(base64_encode(hash_hmac('sha256', $timestamp . "\n" . $this->secret, $this->secret, true))), $timestamp
            );
        }

        $response = (new Client)->post($url, [
            'verify' => false,
            'json' => $message
        ]);

        $stdClass = json_decode((string)$response->getBody());

        if ($stdClass->errcode !== 0) {
            throw new BusinessExceptions($stdClass->errmsg, $stdClass->errcode);
        }

        return $stdClass;
    }
}