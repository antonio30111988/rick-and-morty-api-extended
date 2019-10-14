<?php

namespace App\Traits;

use App\Loggers\RestApiLogger;

trait RestApiLogTrait
{
    /**
     * @param string $message
     */
    public function logInfo(string $message): void
    {
        RestApiLogger::initializeLogger()->info(
            'Action log time: ' . $message
        );
    }

    /**
     * @param \Exception $exception
     */
    public function logError(\Exception $exception): void
    {
        RestApiLogger::initializeLogger()->error(
            'Error occurred: ' . $exception->getMessage() . ' ' . $exception->getTrace()
        );
    }
}