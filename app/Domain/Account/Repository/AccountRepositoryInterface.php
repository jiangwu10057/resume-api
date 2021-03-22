<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository;

interface AccountRepositoryInterface
{
    function create($info);

    function find($uid);

    function login($info);
}