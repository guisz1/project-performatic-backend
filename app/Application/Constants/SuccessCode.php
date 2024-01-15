<?php

declare(strict_types=1);

namespace Application\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class SuccessCode extends AbstractConstants
{
    /**
     * @Message("Created")
     */
    public const CREATED = 201;

    /**
     * @Message("No Content")
     */
    public const NO_CONTENT = 204;
}
