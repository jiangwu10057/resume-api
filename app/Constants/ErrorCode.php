<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 * 
 * 统一格式：A-BB-CCC
 * A:错误级别，如1代表系统级错误，2代表服务级错误（玩家错误） 3代表外部依赖错误；
 * B:项目或模块名称，一般公司不会超过99个项目；
 * C:具体错误编号，自增即可，一个项目999种错误应该够用；
 */
class ErrorCode extends AbstractConstants
{

    /**
     * @Message("Bad Request")
     */
    const BAD_REQUEST = 400;

    /**
     * @Message("NOT FOUND")
     */
    const NOT_FOUND = 404;

    /**
     * @Message("Method Not Allowed")
     */
    const METHOD_NOT_ALLOWED = 405;

    /**
     * @Message("Server Error！")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("参数类型错误")
     */
    const PARAMETER_TYPE_ERROR = 201001;
}
