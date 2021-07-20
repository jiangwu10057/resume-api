<?php

declare(strict_types=1);

namespace App\Domain\User\Service\Impl;

use App\Domain\User\Entity\MPCode;
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

    public function saveMPCode($uid, $content): bool
    {
        $mpCode = new MPCode();
        $mpCode->setUid($uid);
        $mpCode->setContent($content);
        
        return $this->mpCodeRepository->create($mpCode) > 0;
    }

    public function findMPCodeByUid($uid): string
    {
        $model = $this->mpCodeRepository->findByUid("".$uid);
        if (!is_null($model)) {
            return $model->content;
        }

        return "";
    }
}
