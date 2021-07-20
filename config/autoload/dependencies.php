<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    App\Domain\Account\Service\AccountDomainServiceInterface::class => App\Domain\Account\Service\Impl\AccountDomainService::class,
    App\Domain\User\Service\UserDomainServiceInterface::class => App\Domain\User\Service\Impl\UserDomainService::class,
    App\Domain\Resume\Service\ResumeDomainServiceInterface::class => App\Domain\Resume\Service\Impl\ResumeDomainService::class,


    App\Domain\User\Repository\MPCodeRepositoryInterface::class => App\Domain\User\Repository\Impl\MPCodeRepository::class,
    App\Domain\Account\Repository\AccountRepositoryInterface::class => App\Domain\Account\Repository\Impl\AccountRepository::class,
    App\Domain\Account\Repository\SocialAccountRepositoryInterface::class => App\Domain\Account\Repository\Impl\SocialAccountRepository::class,

];
