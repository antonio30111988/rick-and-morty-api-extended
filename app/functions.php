<?php

use Illuminate\Http\Request;
use Carbon\Carbon;

if (!function_exists('getRequestData')) {
    try {
        /**
         * @param Request $request
         * @return string
         */
        function getRequestData(Request $request)
        {
            return  'request time: ' . $this->logInfo(Carbon::now()->toDateTimeString()) . PHP_EOL .
                    'request User Agent: ' . $request->header('User-Agent') . PHP_EOL .
                    'request IP: ' . $request->getClientIp() . PHP_EOL .
                    'end request IP: ' . last($request->getClientIps()) . PHP_EOL .
                    'request url: ' . $request->url() . PHP_EOL .
                    'request data: ' . json_encode($request);
        }
    } catch (\Exception $ex) {
    }
}
