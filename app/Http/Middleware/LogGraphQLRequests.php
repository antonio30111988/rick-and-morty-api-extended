<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Traits\GraphQlLogTrait;
use Closure;
use Carbon\Carbon;
use Exception;

class LogGraphQLRequests
{
    use GraphQlLogTrait;

    /**
     * @param         $request
     * @param Closure $next
     *
     * @return mixed
     * @throws Exception
     */
    public function handle($request, Closure $next)
    {
        //$requestData  = getRequestData($request);
        //$this->logInfo($requestData);
        $this->logInfo('request time: ' . $this->logInfo(Carbon::now()->toDateTimeString()) . PHP_EOL .
            'request User Agent: ' . $request->header('User-Agent') . PHP_EOL .
            'request IP: ' . $request->getClientIp() . PHP_EOL .
            'end request IP: ' . last($request->getClientIps()) . PHP_EOL .
            'request url: ' . $request->url() . PHP_EOL .
            'request data: ' . json_encode($request));

        return $next($request);
    }
}
