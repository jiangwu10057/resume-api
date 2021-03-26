<?php

declare(strict_types=1);

namespace App\Middleware;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Logger\LoggerFactory;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;


class RequestLogMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    public function __construct(ContainerInterface $container, RequestInterface $request, LoggerFactory $loggerFactory)
    {
        $this->container = $container;
        $this->request = $request;
        $this->logger = $loggerFactory->get('log', 'request');
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        if ($request->getMethod() != 'OPTIONS') {
            $this->logger->info($this->request->url() . ' ' . json_encode($this->request->all(), JSON_UNESCAPED_UNICODE));
        }

        return $handler->handle($request);
    }
}