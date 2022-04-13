<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class ProjectType
{
    /**
     * @var 公司项目
     */
    const COMPANY = 1;

    /**
     * @var OPENSOURCE
     */
    const OPENSOURCE = 2;
}