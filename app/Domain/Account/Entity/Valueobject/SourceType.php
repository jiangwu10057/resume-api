<?php

declare(strict_types=1);

namespace App\Domain\Account\Entity\Valueobject;

class SourceType
{
    private function __construct()
    {

    }
    
    /**
     * @var 微信
     */
    const WECHAT = 1;

    /**
     * @var 阿里
     */
    const ALI = 2;

    public static function isWechat($source)
    {
        return $source == self::WECHAT;
    }

    public static function isAli($source)
    {
        return $source == self::ALI;
    }
}