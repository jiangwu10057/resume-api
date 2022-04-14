<?php

declare(strict_types=1);

namespace App\Domain\Account\Service;

use App\Constants\ErrorCode;

use App\Domain\Account\Entity\Valueobject\Address;
use App\Domain\Account\Entity\Valueobject\Social;
use App\Domain\Account\Entity\Valueobject\SourceType;
use App\Domain\Account\Entity\Valueobject\Wechat;
use App\Model\SocialAccountModel;

use App\Exception\BusinessException;

class SocialAccountFactory
{
    private function __construct()
    {
    }

    public static function fromRequest(array $data): Social
    {
        if (SourceType::isWechat($data['source'])) {
            return self::wechatFromRequest($data);
        } else {
            return null;
        }
    }

    public static function mergerInfo(Social $store, Social $request): Social
    {
        if(!empty($request->getAvatarUrl()) && $request->getAvatarUrl() != $store->getAvatarUrl()) {
            $store->setAvatarUrl($request->getAvatarUrl());
        }
        if($request->getGender() > -1 && $request->getGender() != $store->getGender()) {
            $store->setGender($request->getGender());
        }
        if(!empty($request->getNickName()) && $request->getNickName() != $store->getNickName()) {
            $store->setNickName($request->getNickName());
        }
        if(!empty($request->getAddress()) && $request->getAddress() != $store->getAddress()) {
            $store->setAddress($request->getAddress());
        }

        return $store;
    }

    private static function wechatFromRequest(array $data): Wechat
    {
        $wechat = new Wechat();

        if (!empty($data['id'])) {
            $wechat->setId($data['id']);
        }

        if (!empty($data['uid'])) {
            $wechat->setUid($data['uid']);
        }

        if (empty($data['openid'])) {
            throw new BusinessException(ErrorCode::BAD_REQUEST, 'openid为空');
        }

        $wechat->setOpenid($data['openid']);
        $wechat->setAvatarUrl($data['avatarUrl'] ?? '');
        $wechat->setAddress(self::addressFromRequest($data));
        $wechat->setGender($data['gender'] ?? '');
        $wechat->setNickName($data['nickName'] ?? '');

        return $wechat;
    }

    public static function fromModel(SocialAccountModel $model): Social
    {
        if (SourceType::isWechat($model->source)) {
            return self::wechat($model);
        }

        return null;
    }

    private static function wechat(SocialAccountModel $model): Wechat
    {
        $wechat = new Wechat();

        $wechat->setId($model->id);
        $wechat->setUid($model->uid);
        $wechat->setAvatarUrl($model->avatarUrl);
        $wechat->setAddress(self::address($model));
        $wechat->setGender($model->gender);
        $wechat->setNickName($model->nickName);
        $wechat->setOpenid($model->openid);
        return $wechat;
    }

    private static function address(SocialAccountModel $model): Address
    {
        $address = new Address();

        $address->setCountry($model->country);
        $address->setProvince($model->province);
        $address->setCity($model->city);

        return $address;
    }

    private static function addressFromRequest(array $data): Address
    {
        $address = new Address();

        $address->setCountry($data['country'] ?? '');
        $address->setProvince($data['province'] ?? '');
        $address->setCity($data['city'] ?? '');

        return $address;
    }
}
