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
 * @Controller(prefix="/v1/user")
 */
class UserController extends AbstractController
{
    /**
     * @RequestMapping(path="index", methods="post")
     */
    public function index()
    {
        
    }

    /**
     * @RequestMapping(path="query", methods="post")
     */
    public function query()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $service = new ResumeDomainService();
        $result = $service->createResumeContent($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="login", methods="post")
     */
    public function login()
    {

        $request = new Request($this->request);
        $data = $request->getData();

        $service = new ResumeDomainService();
        $result = $service->createResumeContent($data);

        return Response::init($this->response)->setData($result)->send();
    }
}
