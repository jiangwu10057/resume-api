<?php

declare(strict_types=1);

namespace App\Domain\Account\Service\Impl;

use App\Constants\ErrorCode;
use App\Domain\Account\Entity\Account;
use App\Domain\Account\Entity\Valueobject\Social;
use App\Domain\Account\Entity\Valueobject\SourceType;
use App\Domain\Account\Repository\AccountRepositoryInterface;
use App\Domain\Account\Repository\SocialAccountRepositoryInterface;
use App\Domain\Account\Service\AccountDomainServiceInterface;
use App\Domain\Account\Service\SocialAccountFactory;
use App\Exception\BusinessException;

use Hyperf\DbConnection\Db;
use Hyperf\Di\Annotation\Inject;

class AccountDomainService implements AccountDomainServiceInterface
{
    /**
     * @Inject 
     * @var AccountRepositoryInterface
     */
    private $accountRepository;

    /**
     * @Inject 
     * @var SocialAccountRepositoryInterface
     */
    private $socialAccountRepository;

    public function login()
    {
    }

    public function socialLogin(array $socialInfo): Social
    {
        $social = SocialAccountFactory::fromRequest($socialInfo);

        $storedSocial = $this->socialAccountRepository->findByOpenid($social);

        if ($storedSocial) {
            $social->setUid($storedSocial->getUid());
            $social->setId($storedSocial->getId());
            if ($this->socialAccountRepository->update($social)){
                return $social;
            }
            return $storedSocial;
        } else {
            return $this->registerSocialAccount($social);
        }
    }

    public function codeLogin(string $code): ?Social
    {
        $result = file_get_contents("https://api.weixin.qq.com/sns/jscode2session?appid=".env("WECHAT_MINI_APPID")."&secret=".env("WECHAT_MINI_APP_SECRET")."&grant_type=authorization_code&js_code=".$code);
        if ($result === false) {
            return null;
        }
        $result = json_decode($result, true);
        if($result === false) {
            return null;
        }

        $openid = $result['openid'];

        return $this->socialLogin([
            'openid' => $openid,
            'source' => SourceType::WECHAT
        ]);
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
            
            throw new BusinessException((int)$ex->getCode(), $ex->getMessage());
            
            return null;
        }
    }

    private function createAccount(?Account $account)
    {
        if (!$account) {
            $account = new Account();
        }

        $model = $this->accountRepository->create($account);
        if (!$model->id) {
            throw new BusinessException(ErrorCode::INSERT_FAILED, '账号生成失败');
        }

        $account->setUid($model->uid);

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
