<?php

declare(strict_types=1);

namespace App\Controller;

use App\Infrastructure\Common\Api\Request;
use App\Infrastructure\Common\Api\Response;
use App\Domain\Resume\Service\ResumeDomainService;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller()
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
        $service->createResumeContent($data);

        return Response::init($this->response)->setData($data)->send();
    }

    /**
     * @RequestMapping(path="share", methods="post")
     */
    public function share()
    {

    }


}
