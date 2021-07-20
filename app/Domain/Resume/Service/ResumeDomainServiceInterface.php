<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

interface ResumeDomainServiceInterface {
    function createResumeContent($data);
    function updateResumeContent($data);
    function createResume($data);
    function preview($id);
    function my($uid);
    function share($id);
}