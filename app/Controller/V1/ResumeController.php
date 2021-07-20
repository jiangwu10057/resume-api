<?php

declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AbstractController;
use App\Domain\Resume\Service\ResumeDomainServiceInterface;
use App\Infrastructure\Common\Api\Request;
use App\Infrastructure\Common\Api\Response;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

use Hyperf\Di\Annotation\Inject;

/**
 * @Controller(prefix="/v1/resume")
 */
class ResumeController extends AbstractController
{
     /**
     * @Inject 
     * @var ResumeDomainServiceInterface
     */
    private $service;

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

        $result = $this->service->createResumeContent($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="update", methods="post")
     */
    public function update()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->service->updateResumeContent($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="preview", methods="post")
     */
    public function preview()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->service->preview($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="my", methods="post")
     */
    public function my()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->service->my($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="share", methods="post")
     */
    public function share()
    {
    }
}