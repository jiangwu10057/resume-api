<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Transform;

interface TransformInterface
{
    function transform($data);
}