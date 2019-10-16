<?php

namespace App\Exceptions;

use App\Http\Controllers\Api\Traits\ErrorResponse;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use RickAndMortyApiClient\Services\Api\Exception\ErrorCodes;

class Handler extends ExceptionHandler
{
    use ErrorResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $e
     * @return \Illuminate\Http\JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $e)
    {
        $rendered = parent::render($request, $e);

        if ($e instanceof ValidationException) {
            return $this->errorResponse($e, Response::HTTP_UNPROCESSABLE_ENTITY, ErrorCodes::VALIDATION_ERROR);
        }
        return $this->errorResponse($e, $rendered->getStatusCode());
    }
}
