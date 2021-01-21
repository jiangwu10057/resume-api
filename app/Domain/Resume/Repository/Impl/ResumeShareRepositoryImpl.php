<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\ResumeSharedModel;

class ResumeContentRepositoryImpl implements ResumeRepositoryInterface
{
    function save($content)
    {
        $model = $this->assignment(new ResumeSharedModel(), $content);

        return $model->save();
    }

    public function update($content)
    {
        $model = ResumeSharedModel::query()->find($content->getId());
        $model = $this->assignment($model, $content);
        
        return $model->save();
    }

    private function assignment($model, $content)
    {
        $model->rid = $content->getResume()->getId();

        return $model;
    }

    public function delete($id)
    {
        $model = ResumeSharedModel::query()->find($id);
        
        return $model->delete();
    }

    function findById($id)
    {
        return ResumeSharedModel::query()->find($id);
    }

    function queryByUser($user)
    {
        return null;
    }
}