<?php

namespace App\Loggers;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class RestApiLogger
{
    /**
     * @var Logger
     */
    private static $logger = null;

    /**
     * @return Logger
     */
    public static function initializeLogger(): Logger
    {
        if (!self::$logger) {
            self::$logger = new Logger('rest_api_logger');

            self::$logger->pushHandler(new StreamHandler(storage_path() . '/logs/rest_api.log'));
        }
        return self::$logger;
    }
}