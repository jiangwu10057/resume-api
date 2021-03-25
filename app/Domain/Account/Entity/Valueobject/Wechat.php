<?php

declare(strict_types=1);

namespace App\Domain\Account\Entity\Valueobject;

class Wechat extends Social
{
    public function __construct()
    {
        parent::__construct();
        $this->setSource(SourceType::WECHAT);
    }
}