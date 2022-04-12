<?php

declare(strict_types=1);

namespace App\Controller\V1;

use App\Controller\AbstractController;
use App\Domain\Account\Service\AccountDomainServiceInterface;
use App\Infrastructure\Common\Api\Request;
use App\Infrastructure\Common\Api\Response;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;

/**
 * @Controller(prefix="/v1/account")
 */
class AccountController extends AbstractController
{
    /**
     * @Inject 
     * @var AccountDomainServiceInterface
     */
    private $accountService;

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
        return Response::init($this->response)->setData('')->send();
    }

    /**
     * @RequestMapping(path="socialInfo", methods="post")
     */
    public function socialInfo()
    {
        $request = new Request($this->request);
        
        $result = $this->accountService->socialInfo($request->getData());

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="login", methods="post")
     */
    public function login()
    {
        return Response::init($this->response)->setData('')->send();
    }

    /**
     * @RequestMapping(path="socialLogin", methods="post")
     */
    public function socialLogin()
    {
        $request = new Request($this->request);
        $data = $request->getData();

        $result = $this->accountService->socialLogin($data);

        return Response::init($this->response)->setData($result)->send();
    }

    /**
     * @RequestMapping(path="codeLogin", methods="post")
     */
    public function codeLogin()
    {
        $request = new Request($this->request);
        $code = $request->getData('code');

        $result = $this->accountService->codeLogin($code);

        if($result == null) {
            return Response::init($this->response)->setCode(500)->setMessage('微信登录失败')->send();
        }

        return Response::init($this->response)->setData($result)->send();
    }
}
