<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\Traits;

use Exception;
use Illuminate\Http\JsonResponse;

trait ErrorResponse
{
    /**
     * @param Exception $e
     * @param int       $httpCode
     * @param int       $internalErrorCode
     *
     * @return JsonResponse
     */
    protected function errorResponse(Exception $e, int $httpCode, int $internalErrorCode = 9999): JsonResponse
    {
        $error = [
            'error' => [
                'code' => $internalErrorCode,
                'message' => $e->getMessage()
            ]
        ];
        if (method_exists($e, 'errors')) {
            $error['error']['error_details'] = $e->errors();
        }
        return response()->json($error, $httpCode);
    }
}
