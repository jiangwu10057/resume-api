<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Sex
{
    /**
     * @var 男
     */
    const MALE = "男";

    /**
     * @var 女
     */
    const FEMALE = "女";

    /**
     * @var 其他???
     */
    const OTHER = "其他";
}