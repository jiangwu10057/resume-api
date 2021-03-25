<?php

declare(strict_types=1);

namespace App\Domain\Account\Service;

use App\Domain\Account\Entity\Account;
use App\Model\AccountModel;

class AccountFactory
{
    private function __construct()
    {
    }

    public static function fromModel(AccountModel $model) : Account
    {
        $account = new Account();

        if(!$model){
            return $account;
        }

        $account->setUid($model->uid);
        $account->setPassword($model->password);
        $account->setMobile($model->mobile);

        return $account;
    }
}