<?php

declare(strict_types=1);

namespace App\Domain\Resume\Repository\Impl;

use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Repository\ResumeRepositoryInterface;
use App\Model\Model;
use App\Model\ResumeContentModel;

// use Hyperf\Cache\Annotation\Cacheable;
// use Hyperf\Cache\Annotation\CacheEvict;

// use Hyperf\Di\Annotation\Inject;
// use Hyperf\Cache\Listener\DeleteListenerEvent;
// use Psr\EventDispatcher\EventDispatcherInterface;

class ResumeContentRepositoryImpl implements ResumeRepositoryInterface
{
    //  /**
    //  * @Inject
    //  * @var EventDispatcherInterface
    //  */
    // protected $dispatcher;

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
        $result =  $model->saveOrFail();
        if($result){
            // $this->dispatcher->dispatch(new DeleteListenerEvent('resume-content-update', [$content->getId()]));
        }
        return $result;
    }

    private function assignment($model, $content)
    {
        $model->uid = $content->getUid();
        $model->title = $content->getTitle();
        $model->target = $content->getTarget();
        $model->except = $content->getExcept();
        $model->personal = $content->getPersonal();
        $model->work_experiences = json_encode($content->getWorkExperience(), JSON_UNESCAPED_UNICODE);
        $model->education_experiences = json_encode($content->getEducation(), JSON_UNESCAPED_UNICODE);
        $model->skills = json_encode($content->getSkills(), JSON_UNESCAPED_UNICODE);
        $model->works = $content->getWorks();

        return $model;
    }

    // /**
    //  * @CacheEvict(prefix="rc", value="#{id}")
    //  */
    public function delete(int $id): bool
    {
        $model = ResumeContentModel::query()->find($id);

        return $model->delete();
    }

    // /**
    //  * @Cacheable(prefix="rc", value="#{id}", ttl=7200, listener="resume-content-update")
    //  */
    function findById($id): ?Model
    {
        return ResumeContentModel::query()->find($id);
    }

    function findByUser($user): Model
    {
        return ResumeContentModel::where('uid', $user)->orderBy('id', 'desc')->firstOrFail();
    }
}
