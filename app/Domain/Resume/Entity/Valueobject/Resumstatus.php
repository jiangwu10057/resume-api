<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class ResumeStatus
{
    /**
     * @var 有效
     */
    const VALID = 1;

    /**
     * @var 过期
     */
    const OUTDATED = 2;

    /**
     * @var 预览
     */
    const PREVIEW = 3;
}