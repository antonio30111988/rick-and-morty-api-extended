<?php

namespace App\Traits;

use App\GraphQL\Loggers\GraphQlLogger;

trait GraphQlLogTrait
{
    /**
     * @param string $message
     */
    public function logInfo(string $message): void
    {
        GraphQlLogger::initializeLogger()->info(
            'Action log time: ' . $message
        );
    }

    /**
     * @param array $errorDetails
     */
    public function logError(array $errorDetails): void
    {
        GraphQlLogger::initializeLogger()->error(
            'Error occurred: ' . $errorDetails['message']
        );
    }
}