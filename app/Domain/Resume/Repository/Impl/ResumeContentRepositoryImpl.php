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

        return $model->save();
    }

    public function update($content)
    {
        $model = ResumeContentModel::query()->find($content->getId());
        $model = $this->assignment($model, $content);
        
        return $model->save();
    }

    private function assignment($model, $content)
    {
        $model->uid = $content->getUid();
        $model->title = $content->getTitle();
        $model->target = $content->getTarget();
        $model->contact = $content->getContact();
        $model->personal = $content->getPersonal();
        $model->work_experiences = $content->getWorkExperience();
        $model->education_experiences = $content->getEducation();
        $model->skills = $content->getSkills();
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