<?php

declare(strict_types=1);

namespace App\Domain\User\Service\Impl;

use App\Domain\User\Service\UserDomainServiceInterface;
use App\Domain\User\Repository\MPCodeRepositoryInterface;

use Hyperf\Di\Annotation\Inject;

class UserDomainService implements UserDomainServiceInterface
{
    /**
     * @Inject 
     * @var MPCodeRepositoryInterface
     */
    private $mpCodeRepository;

    public function saveMPCode($uid, $codeContent): bool
    {
        return false;
    }

    public function findMPCodeByUid($uid): string
    {
        return "";
    }
}
