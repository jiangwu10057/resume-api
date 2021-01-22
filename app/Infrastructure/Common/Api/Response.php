<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Api;

use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;

/**
 * 返回数据统一结构
 * code:错误码
 * message:提示信息
 * data:返回数据
 */
class Response
{
    private $code = 200;
    private $message = "ok";
    private $data = [];
    private $response;

    public static function init(ResponseInterface $response)
    {
        $instance = new static;
        $instance->response = $response;

        return $instance;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
    
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function send() : Psr7ResponseInterface
    {
        return $this->response->withStatus($this->code)->json([
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ]);
    }
}