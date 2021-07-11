<?php

declare(strict_types=1);

namespace App\Domain\User\Service\Impl;

use App\Domain\User\Service\UserDomainServiceInterface;

class UserDomainServiceImpl implements UserDomainServiceInterface
{
    public function saveMPCode($uid, $codeContent): bool
    {
        return false;
    }

    public function findMPCodeByUid($uid): string
    {
        return "";
    }
}
