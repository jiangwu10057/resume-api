<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository;

use App\Domain\Account\Entity\Account;

interface AccountRepositoryInterface
{
    function create(Account $info) : int;

    function find(int $uid) : Account;

    function findByMobile(string $uid) : Account;

    function changePassword(string $uid, string $password) : bool;
}