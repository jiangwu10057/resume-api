<?php

declare(strict_types=1);

namespace App\Domain\Account\Service;

use App\Domain\Account\Entity\Valueobject\Social;

interface AccountDomainServiceInterface
{
    public function login();

    public function socialLogin(array $socialInfo) : ?Social;

    public function codeLogin(string $code) : ?Social;

    public function socialInfo(array $socialInfo) : ?Social;

    public function register();

    public function bind();

    public function changePassword();
}
