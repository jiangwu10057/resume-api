<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class ResumeType
{
    /**
     * @var 免费
     */
    const FREE = 1;

    /**
     * @var 付费
     */
    const FEE = 2;
}