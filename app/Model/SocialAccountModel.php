<?php

declare(strict_types=1);

namespace App\Model;

class SocialAccountModel extends Model
{
    protected $table = 'social_account';

    protected $incrementing = false;

    protected $primaryKey = 'uid';
}