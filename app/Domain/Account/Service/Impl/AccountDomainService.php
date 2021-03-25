<?php

declare(strict_types=1);

namespace App\Domain\Account\Service\Impl;

use App\Constants\ErrorCode;
use App\Domain\Account\Entity\Account;
use App\Domain\Account\Entity\Valueobject\Social;
use App\Domain\Account\Repository\Impl\AccountRepositoryImpl;
use App\Domain\Account\Repository\Impl\SocialAccountRepositoryImpl;
use App\Domain\Account\Service\AccountDomainServiceInterface;
use App\Domain\Account\Service\SocialAccountFactory;
use App\Exception\BusinessException;

use Hyperf\DbConnection\Db;

class AccountDomainService implements AccountDomainServiceInterface
{
    private $accountRepository;
    private $socialAccountRepository;

    public function __construct()
    {
        $this->socialAccountRepository = new SocialAccountRepositoryImpl();
        $this->accountRepository = new AccountRepositoryImpl();
    }

    public function login()
    {
    }

    public function socialLogin(array $socialInfo): Social
    {
        $social = SocialAccountFactory::fromRequest($socialInfo);

        $storedSocial = $this->socialAccountRepository->findByOpenid($social);

        if ($storedSocial) {
            return $storedSocial;
        } else {
            return $this->registerSocialAccount($social);
        }
    }

    private function registerSocialAccount(Social $social)
    {
        Db::beginTransaction();

        try {
            $account = new Account();

            $account = $this->createAccount($account);

            $social->setUid($account->getUid());

            $social = $this->createSocialAccount($social);

            Db::commit();

            return $social;
        } catch (\Throwable $ex) {
            Db::rollBack();

            throw new BusinessException($ex->getCode(), $ex->getMessage());
            
            return null;
        }
    }

    private function createAccount(?Account $account)
    {
        if (!$account) {
            $account = new Account();
        }

        $uid = $this->accountRepository->create($account);
        if (!$uid) {
            throw new BusinessException(ErrorCode::INSERT_FAILED, '账号生成失败');
        }

        $account->setUid($uid);

        return $account;
    }

    private function createSocialAccount(Social $social)
    {
        $id = $this->socialAccountRepository->create($social);

        if (!$id) {
            throw new BusinessException(ErrorCode::INSERT_FAILED, '社交账号保存失败');
        }

        $social->setId($id);

        return $social;
    }

    public function register()
    {
    }

    public function bind()
    {
    }

    public function changePassword()
    {
    }
}
