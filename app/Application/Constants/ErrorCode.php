<?php

declare(strict_types=1);

namespace Application\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("bad request")
     */
    public const BAD_REQUEST = 400;

    /**
     * @Message("unauthorized")
     */
    public const UNAUTHORIZED = 401;

    /**
     * @Message("forbidden")
     */
    public const FORBIDDEN = 403;

    /**
     * @Message("resource not found")
     */
    public const NOT_FOUND = 404;

    /**
     * @Message("validation error")
     */
    public const VALIDATION_ERROR = 422;

    /**
     * @Message("locked error")
     */
    public const LOCKED_ERROR = 423;

    /**
     * @Message("internal server error")
     */
    public const SERVER_ERROR = 500;
    /**
     * @Message("not implemented")
     */
    public const NOT_IMPLEMENTED = 0;

    /**
     * @Message("invalid password or login")
     */
    public const INVALID_PASSWORD = 1001;

    /**
     * 
     * @Message("amount is not valid")
     */
    public const ACCOUNT_AMOUNT_NOT_VALID = 1002;

    /**
     * 
     * @Message("account type not allowed")
     */
    public const ACCOUNT_TYPE_NOT_ALLOWED = 1003;

    /**
     * 
     * @Message("account exchange cannot be validated")
     */
    public const ACCOUNT_EXCHANGE_NOT_VALIDATED = 1004;

    /**
     * 
     * @Message("")
     */
    public const VALIDATION_SERVER_IS_OFFLINE = 1005;
}
