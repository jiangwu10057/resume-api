<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository;

interface ResumeRepositoryInterface
{
    function save($content);

    function update($content);

    function delete($id);

    function findById($id);

    function queryByUser($user);
}