<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository\Impl;

use App\Domain\Account\Repository\AccountRepositoryInterface;

use App\Domain\Account\Service\AccountFactory;
use App\Domain\Account\Entity\Account;
use App\Model\AccountModel;

class AccountRepositoryImpl implements AccountRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new AccountModel();
    }

    public function create(Account $info) : int
    {
        $model = $this->assignment($this->model, $info);
        if($model->saveOrFail()){
            return $model->id;
        }
        return 0;
    }

    private function assignment($model, $info)
    {
        if($info->getUid()){
            $model->id = $info->getUid();
        }
        
        $model->password = $info->getPassword();
        $model->mobile = $info->getMobile();

        return $model;
    }

    public function find(int $uid) : Account
    {
        $model = AccountModel::query()->find($uid);
        return AccountFactory::fromModel($model);
    }

    function findByMobile(string $uid) : Account
    {
        return new Account();
    }

    public function changePassword(string $uid, string $password) : bool
    {
        return true;
    }
}