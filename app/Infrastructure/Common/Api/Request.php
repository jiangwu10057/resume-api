<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Api;

use App\Constants\ErrorCode;
use App\Exception\RequestException;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * - t时间戳，与r参数一起降低重放攻击的可能性；有效期3分钟;长度13位
 * - r随机uuid，与t参数一起降低重放攻击的可能性来；存储时间3分钟;
 * - d是真正的数据
 * - s=md5(d+r+t)，用于校验完整性
 */
class Request
{
    private $_request;
    private $_time;
    private $_random;
    private $_data;
    private $_sign;

    private $validTimeSeconds = 180;

    public function __construct(RequestInterface $request)
    {
        $this->_request = $request;
        $this->parse();
    }

    private function parse()
    {
        $this->_time = $this->_request->input('t');
        $this->_random = $this->_request->input('r');
        $this->_data = urldecode($this->_request->input('d', ''));
        $this->_sign = $this->_request->input('s');

        if(!$this->validate()){
            throw new RequestException(ErrorCode::BAD_REQUEST, '验证失败');
        }

        if(!$this->parseData()){
            throw new RequestException(ErrorCode::BAD_REQUEST, '数据解析失败');
        }
    }

    private function validate()
    {
        if(!$this->validateTime()){
            return false;
        }

        if($this->isDuplicate()){
            return false;
        }

        if(!$this->validateSign()){
            return false;
        }

        return true;
    }

    private function isDuplicate()
    {
        $container = \Hyperf\Utils\ApplicationContext::getContainer();;
        $cache = $container->get(\Psr\SimpleCache\CacheInterface::class);

        $cackeKey = 'r:'.$this->_random;

        if($cache->has($cackeKey)){
            return true;
        }

        $cache->set($cackeKey, 1, $this->validTimeSeconds);

        return false;
    }

    private function validateTime()
    {
        $time = intval($this->_time / 1000);
        $currentTime = time();
        
        if($time >= $currentTime - $this->validTimeSeconds && $time <= $currentTime){
            return true;
        }

        return false;
    }

    private function validateSign()
    {
        $sign = strtoupper(md5($this->_time . $this->_random . $this->_data));

        return $sign == $this->_sign;
    }

    private function parseData()
    {
        $this->_data = json_decode($this->_data, true);

        if(is_null($this->_data)){
            return false;
        }

        return true;
    }

    public function getData($key = null)
    {
        if(is_null($key)){
            return $this->_data;
        }
        return $this->_data[$key];
    }
}