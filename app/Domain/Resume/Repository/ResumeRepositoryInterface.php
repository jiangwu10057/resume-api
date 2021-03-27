<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository;

use App\Domain\Resume\Entity\Content;
use App\Model\Model;

interface ResumeRepositoryInterface
{
    function save(Content $content) : int;

    function update(Content $content) : bool;

    function delete(int $id) : bool;

    function findById(int $id) : Model;

    function findByUser(int $uid) : Model;
}