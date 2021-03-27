<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Entity\Content;
use App\Model\Model;
use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\ResumeModel;

class ResumeRepositoryImpl implements ResumeRepositoryInterface
{
    function save(Content $content): int
    {
        $model = $this->assignment(new ResumeModel(), $content);

        return $model->save();
    }

    public function update(Content $content): bool
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

    public function delete(int $id): bool
    {
        $model = ResumeModel::query()->find($id);

        return $model->delete();
    }

    function findById(int $id): Model
    {
        return ResumeModel::query()->find($id);
    }

    function findByUser($uid): Model
    {
        return ResumeModel::where('uid', $uid)->firstOrFail();
    }
}
