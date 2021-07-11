<?php

declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AbstractController;
use App\Domain\User\Service\UserDomainServiceInterface;
use App\Infrastructure\Common\Api\Request;
use App\Infrastructure\Common\Api\Response;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/user")
 */
class UserController extends AbstractController
{

    /**
     * @Inject 
     * @var UserDomainServiceInterface
     */
    private $service;

    /**
     * @RequestMapping(path="saveMPCode", methods="post")
     */
    public function saveMPCode()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->service->saveMPCode($data['uid'], $data['content']);

        return Response::init($this->response)->setCode($result ? '200' : '400')->send();
    }

    /**
     * @RequestMapping(path="findMPCode", methods="post")
     */
    public function findMPCode()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->service->findMPCodeByUid($data['uid']);

        return Response::init($this->response)->setData($result)->send();
    }


}