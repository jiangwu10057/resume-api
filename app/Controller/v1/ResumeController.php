<?php

declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AbstractController;
use App\Domain\Resume\Service\ResumeDomainService;
use App\Infrastructure\Common\Api\Request;
use App\Infrastructure\Common\Api\Response;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/resume")
 */
class ResumeController extends AbstractController
{
    /**
     * @RequestMapping(path="index", methods="post")
     */
    public function index()
    {
        
    }

    /**
     * @RequestMapping(path="generate", methods="post")
     */
    public function generate()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $service = new ResumeDomainService();
        $result = $service->createResumeContent($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="preview", methods="post")
     */
    public function preview()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $service = new ResumeDomainService();
        $result = $service->preview($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="share", methods="post")
     */
    public function share()
    {

    }


}
