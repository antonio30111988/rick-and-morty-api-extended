<?php declare(strict_types=1);

namespace App\Http\Controllers\Api\Traits;

use Exception;
use GraphQL\Exception\QueryError;
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
    protected function errorResponse(Exception $e, int $httpCode, int $internalErrorCode = 9999)
    {
        $error = [
            'error' => [
                'code' => $internalErrorCode,
                'message' => $e->getMessage(),
                'file' => $e->getFile() . ':' . $e->getLine()
            ]
        ];
        if (method_exists($e, 'errors')) {
            $error['error']['error_details'] = $e->errors();
        }
        return response()->json($error, $httpCode);
    }

    /**
     * @param QueryError $e
     * @param int       $httpCode
     * @param int       $internalErrorCode
     *
     * @return JsonResponse
     */
    protected function graphQlErrorResponse(QueryError $e, int $httpCode, int $internalErrorCode = 9999): JsonResponse
    {
        $errorDetails = $e->getErrorDetails();
        $error = [
            'error' => [
                'code' => $internalErrorCode,
                'message' => $errorDetails['message']
            ]
        ];
        return response()->json($error, $httpCode);
    }
}
