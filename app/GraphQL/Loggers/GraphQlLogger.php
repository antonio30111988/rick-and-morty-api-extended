<?php

namespace App\GraphQL\Loggers;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class GraphQlLogger
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
            self::$logger = new Logger('graphql_logger');

            self::$logger->pushHandler(new StreamHandler(storage_path() . '/logs/graphql.log'));
        }
        return self::$logger;
    }
}