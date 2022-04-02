<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Entity\Content;
use App\Model\Model;
use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\ResumeSharedModel;

class ResumeShareRepositoryImpl implements ResumeRepositoryInterface
{
    function save(Content $content): int
    {
        $model = $this->assignment(new ResumeSharedModel(), $content);

        return $model->save();
    }

    public function update(Content $content): bool
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

    public function delete(int $id): bool
    {
        $model = ResumeSharedModel::query()->find($id);

        return $model->delete();
    }

    function findById(int $id): ?Model
    {
        return ResumeSharedModel::query()->find($id);
    }

    function findByUser(int $uid): Model
    {
        return ResumeSharedModel::where('uid', $uid)->firstOrFail();
    }
}
