<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Constants\ErrorCode;
use App\Domain\Resume\Entity\Share;
use App\Domain\Resume\Entity\Valueobject\ResumeType;
use App\Domain\Resume\Repository\Impl\ResumeContentRepositoryImpl;
use App\Domain\Resume\Repository\Impl\ResumeRepositoryImpl;
use App\Domain\Resume\Repository\Impl\ResumeShareRepositoryImpl;
use App\Exception\BusinessException;
use App\Infrastructure\Common\Formatter\MarkdownFormater;

class ResumeDomainService
{
    private $resumeContentRepository;
    private $resumeRepository;
    private $resumeShareRepository;

    public function __construct()
    {
        $this->resumeContentRepository = new ResumeContentRepositoryImpl();
        $this->resumeRepository = new ResumeRepositoryImpl();
        $this->resumeShareRepository = new ResumeShareRepositoryImpl();
    }

    public function createResumeContent($data)
    {
        $builder = new ResumeContentBuilder();
        $content = $builder->parse($data)->build();
        try {
            $result = $this->resumeContentRepository->save($content);
            if (!$result) {
                throw new \Exception("数据插入失败");
            }

            return $result;
        } catch (\Exception $e) {
            //e->getMessage 会把sql暴露
            throw new BusinessException(ErrorCode::INSERT_FAILED, $e->getMessage());
        }
    }

    public function updateResumeContent($data)
    {
        $builder = new ResumeContentBuilder();
        $content = $builder->parse($data)->build();
        try {
            $result = $this->resumeContentRepository->update($content);
            if (!$result) {
                throw new \Exception("数据更新失败");
            }

            return $result;
        } catch (\Exception $e) {
            throw new BusinessException(ErrorCode::UPDATE_FAILED);
        }
    }

    public function createPreviewResume($data)
    {
        $builder = new ResumeBuilder();
        $resume = $builder->buildPreview();
        try {
            $this->resumeRepository->save($resume);
        } catch (\Exception $e) {
        }
    }

    public function createResume($data)
    {
        $builder = new ResumeBuilder();

        if ($data['type'] == ResumeType::FREE) {
            $resume = $builder->buildFree();
        } else {
            $resume = $builder->buildFee();
        }

        try {
            $this->resumeRepository->save($resume);
        } catch (\Exception $e) {
        }
    }

    public function preview($data)
    {
        if (empty($data['id']) || !is_int($data['id'])) {
            throw new BusinessException(ErrorCode::PARAMETER_TYPE_ERROR);
        }

        $content = $this->resumeContentRepository->findById($data['id']);

        if (empty($content)) {
            throw new BusinessException(ErrorCode::NOT_FOUND);
        }

        return $this->format($content);
    }

    public function my($data)
    {
        if (empty($data['uid']) || !is_int($data['uid'])) {
            throw new BusinessException(ErrorCode::PARAMETER_TYPE_ERROR);
        }

        $content = $this->resumeContentRepository->findByUser($data['uid']);

        if (empty($content)) {
            throw new BusinessException(ErrorCode::NOT_FOUND);
        }

        return $this->format($content);
    }

    private function format($content)
    {
        $formater = new MarkdownFormater();
        return $formater->format($content);
    }

    public function share($data)
    {
        if (empty($data['id']) || !is_int($data['id'])) {
            throw new BusinessException(ErrorCode::PARAMETER_TYPE_ERROR);
        }

        $resume = $this->resumeRepository->findById($data['id']);

        if (empty($resume)) {
            throw new BusinessException(ErrorCode::NOT_FOUND);
        }

        $share = new Share();
        $share->setResume($resume);

        try {
            $id = $this->resumeShareRepository->save($share);
            if (empty($id)) {
                /**
                 * todo
                 * 应该采用ddd的entity的行为操作，然后用repository执行持久化
                 * */
                $resume->share_counter = $resume->share_counter++;
                $resume->save();
            }
        } catch (\Exception $e) {
        }
    }
}
