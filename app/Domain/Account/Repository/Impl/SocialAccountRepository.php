<?php

declare(strict_types=1);

namespace App\Domain\Account\Repository\Impl;

use App\Domain\Account\Repository\SocialAccountRepositoryInterface;
use App\Domain\Account\Entity\Valueobject\Social;
use App\Domain\Account\Service\SocialAccountFactory;
use App\Model\SocialAccountModel;

class SocialAccountRepository implements SocialAccountRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new SocialAccountModel();
    }

    public function create(Social $info) : int
    {
        $model = $this->assignment($this->model, $info);
        if($model->saveOrFail()){
            return $model->id;
        }
        
        return 0;
    }

    public function update(Social $info) : bool
    {
        $model = SocialAccountModel::query()->find($info->getId());
        if(empty($model)){
            return false;
        }
        $model = $this->assignment($model, $info);
        
        return $model->saveOrFail();
    }

    function find(Social $social) : ?Social
    {
        if(empty($social->getUid()) || empty($social->getSource())){
            return null;
        }

        $model = SocialAccountModel::where('uid', $social->getUid())
            ->where('source', $social->getSource())->first();

        return $this->toEntity($model);
    }

    function findByOpenid(Social $social) : ?Social
    {
        if(empty($social->getOpenid()) || empty($social->getSource())){
            return null;
        }

        $model = SocialAccountModel::where('openid', $social->getOpenid())
            ->where('source', $social->getSource())->first();
        
        return $this->toEntity($model);
    }

    private function assignment($model, $info)
    {
        $model->uid = $info->getUid();
        $model->openid = $info->getOpenid();
        $model->avatarUrl = $info->getAvatarUrl();
        $model->city = $info->getAddress()->getCity();
        $model->province = $info->getAddress()->getProvince();
        $model->country = $info->getAddress()->getCountry();
        $model->gender = $info->getGender();
        if($model->gender == '') {
            $model->gender = 0;
        }
        $model->nickName = $info->getNickName();
        $model->source = $info->getSource();

        return $model;
    }

    private function toEntity($model)
    {
        if(!$model){
            return null;
        }

        return SocialAccountFactory::fromModel($model);
    }
}