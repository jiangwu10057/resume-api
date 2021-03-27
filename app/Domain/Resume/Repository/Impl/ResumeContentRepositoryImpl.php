<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\Model;
use App\Model\ResumeContentModel;

class ResumeContentRepositoryImpl implements ResumeRepositoryInterface
{
    public function save(Content $content): int
    {
        $model = $this->assignment(new ResumeContentModel(), $content);
        if ($model->saveOrFail()) {
            return $model->id;
        }
        return 0;
    }

    public function update(Content $content): bool
    {
        $model = ResumeContentModel::find($content->getId());
        $model = $this->assignment($model, $content);
        return $model->saveOrFail();
    }

    private function assignment($model, $content)
    {
        $model->uid = $content->getUid();
        $model->title = $content->getTitle();
        $model->target = $content->getTarget();
        $model->contact = $content->getContact();
        $model->except = $content->getExcept();
        $model->personal = $content->getPersonal();
        $model->work_experiences = json_encode($content->getWorkExperience(), JSON_UNESCAPED_UNICODE);
        $model->education_experiences = json_encode($content->getEducation(), JSON_UNESCAPED_UNICODE);
        $model->skills = json_encode($content->getSkills(), JSON_UNESCAPED_UNICODE);
        $model->works = $content->getWorks();

        return $model;
    }

    public function delete(int $id): bool
    {
        $model = ResumeContentModel::query()->find($id);

        return $model->delete();
    }

    function findById($id): Model
    {
        return ResumeContentModel::query()->find($id);
    }

    function findByUser($user): Model
    {
        return ResumeContentModel::where('uid', $user)->orderBy('id', 'desc')->firstOrFail();
    }
}
