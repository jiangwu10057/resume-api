<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\ResumeContentModel;

class ResumeContentRepositoryImpl implements ResumeRepositoryInterface
{

    public function save($content)
    {
        $model = $this->assignment(new ResumeContentModel(), $content);
        return $model->saveOrFail();
    }

    public function update($content)
    {
        $model = ResumeContentModel::query()->find($content->getId());
        $model = $this->assignment($model, $content);
        
        return $model->saveOrFail();
    }

    private function assignment($model, $content)
    {
        $model->uid = $content->getUid();
        $model->title = $content->getTitle();
        $model->target = $content->getTarget();
        $model->contact = $content->getContact();
        $model->personal = $content->getPersonal();
        $model->work_experiences = json_encode($content->getWorkExperience(), JSON_UNESCAPED_UNICODE);
        $model->education_experiences = json_encode($content->getEducation(), JSON_UNESCAPED_UNICODE);
        $model->skills = json_encode($content->getSkills(), JSON_UNESCAPED_UNICODE);
        $model->works = $content->getWorks();

        return $model;
    }

    public function delete($id)
    {
        $model = ResumeContentModel::query()->find($id);
        
        return $model->delete();
    }

    function findById($id)
    {
        return ResumeContentModel::query()->find($id);
    }

    function queryByUser($user)
    {
        return ResumeContentModel::where('uid', $user)->firstOrFail();
    }
}