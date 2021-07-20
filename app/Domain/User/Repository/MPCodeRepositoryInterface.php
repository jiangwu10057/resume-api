<?php

declare(strict_types=1);

namespace App\Domain\User\Repository;

use App\Domain\User\Entity\MPCode;
use App\Model\Model;
interface MPCodeRepositoryInterface
{
    function create(MPCode $info) : int;

    function update(MPCode $info) : bool;

    function findByUid(string $uid) : ?Model;
}