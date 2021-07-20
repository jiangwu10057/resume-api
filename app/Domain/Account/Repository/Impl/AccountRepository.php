<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository\Impl;

use App\Domain\Account\Repository\AccountRepositoryInterface;

use App\Domain\Account\Service\AccountFactory;
use App\Domain\Account\Entity\Account;
use App\Model\AccountModel;

class AccountRepository implements AccountRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new AccountModel();
    }

    public function create(Account $info) : ?AccountModel
    {
        $model = $this->assignment($this->model, $info);
        if($model->saveOrFail()){
            $model->uid = sprintf("%u", crc32("".$model->id));
            $model->saveOrFail();
            return $model;
        }
        return null;
    }

    private function assignment($model, $info)
    {
        if($info->getId()){
            $model->id = $info->getId();
        }
        
        $model->uid = $info->getUid();
        $model->password = $info->getPassword();
        $model->mobile = $info->getMobile();

        return $model;
    }

    public function find(int $uid) : ?Account
    {
        $model = AccountModel::query()->find($uid);
        return AccountFactory::fromModel($model);
    }

    function findByMobile(string $uid) : ?Account
    {
        return new Account();
    }

    public function changePassword(string $uid, string $password) : bool
    {
        return true;
    }
}