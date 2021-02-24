<?php

declare(strict_types=1);

namespace App\Infrastructure\Common\Formatter;

interface FormatterInterface
{
    function format($data);
}