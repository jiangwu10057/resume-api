<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\ResumeModel;

class ResumeRepositoryImpl implements ResumeRepositoryInterface
{
    function save($content)
    {
        $model = $this->assignment(new ResumeModel(), $content);

        return $model->save();
    }

    public function update($content)
    {
        $model = ResumeModel::query()->find($content->getId());
        $model = $this->assignment($model, $content);
        
        return $model->save();
    }

    private function assignment($model, $content)
    {
        $model->uid = $content->getUid();
        $model->is_valid = $content->isValid();
        $model->type = $content->getType();
        $model->show_end_time = $content->getShowEndTime();
        $model->share_counter = $content->getShareCounter();
        $model->rcid = $content->getContent()->getId();

        return $model;
    }

    public function delete($id)
    {
        $model = ResumeModel::query()->find($id);
        
        return $model->delete();
    }

    function findById($id)
    {
        return ResumeModel::query()->find($id);
    }

    function queryByUser($user)
    {
        return ResumeModel::where('uid', $user)->firstOrFail();
    }
}