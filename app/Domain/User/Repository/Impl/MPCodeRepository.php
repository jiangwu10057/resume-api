<?php

declare(strict_types=1);

namespace App\Domain\User\Repository\Impl;

use App\Domain\User\Entity\MPCode;
use App\Domain\User\Repository\MPCodeRepositoryInterface;
use App\Model\MPCodeModel;

class MPCodeRepository implements MPCodeRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = new MPCodeModel();
    }

    public function create(MPCode $info) : int
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
            $model->uid = $info->getUid();
        }
        
        $model->content = $info->getContent();

        return $model;
    }

    public function update(MPCode $info) : bool {
        return true;
    }

    public function findByUid(string $uid) : ?MPCode {
        return null;
    }
}