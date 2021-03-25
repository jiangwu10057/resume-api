<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository;

use App\Domain\Account\Entity\Valueobject\Social;

interface SocialAccountRepositoryInterface
{
    function create(Social $info) : int;

    function update(Social $info) : bool;

    function find(Social $social) : ?Social;

    function findByOpenid(Social $social) : ?Social;
}