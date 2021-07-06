<?php

declare(strict_types=1);

namespace App\Domain\User\Service\Impl;

interface UserDomainService
{
    public function saveMPCode($uid, $codeContent): bool;

    public function findMPCodeByUid($uid): string;
}
