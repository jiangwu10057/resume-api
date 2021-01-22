<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Api;

use App\Constants\ErrorCode;
use App\Exception\RequestException;
use Hyperf\HttpServer\Contract\RequestInterface;

/**
 * - t时间戳，与r参数一起降低重放攻击的可能性；有效期3分钟
 * - r随机数，与t参数一起降低重放攻击的可能性来；存储时间3分钟
 * - d是按字母排序后的json数据的base64值，真正的数据
 * - s是按字母排序后json数据的md5值，用于校验完整性
 */
class Request
{
    private $_request;
    private $_time;
    private $_random;
    private $_data;
    private $_sign;

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
        if(!$this->parseData()){
            throw new RequestException(ErrorCode::BAD_REQUEST);
        }
    }

    private function parseData()
    {
        $this->_data = base64_decode($this->_data);
        $this->_data = json_decode($this->_data, true);
        
        if(is_null($this->_data)){
            return false;
        }

        return true;
    }

    private function valid()
    {
        return true;
    }

    public function getData($key = null)
    {
        if(!$this->valid()){
            throw new RequestException(ErrorCode::BAD_REQUEST);
        }

        if(is_null($key)){
            return $this->_data;
        }
        return $this->_data[$key];
    }
}