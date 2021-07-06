<?php

declare(strict_types=1);

namespace App\Domain\User\Service;

interface UserDomainServiceInterface
{
    function saveMPCode($uid, $codeContent): bool;

    function findMPCodeByUid($uid): string;
}
