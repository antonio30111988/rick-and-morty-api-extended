<?php

namespace App\Http\Controllers\Api;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetLocationDimensionCharactersQuery;
use App\Http\Controllers\GraphQL\RestApiController;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationDimensionCharactersController extends RestApiController
{
    /**
     *
     * @param Request                             $request
     * @param GraphQlClientProvider               $client
     * @param GetLocationDimensionCharactersQuery $queryBuilder
     *
     * @return JsonResponse
     */
    public function __invoke(
        Request $request,
        GraphQlClientProvider $client,
        GetLocationDimensionCharactersQuery $queryBuilder
    ): JsonResponse {

        try {
            $results = $client->runQuery(
                $queryBuilder->query(),
                true,
                $request->toArray()['filter']
            );
        } catch (\Exception $exception) {
            $this->logError($exception);
            exit;
        }
        $results->reformatResults(true);

        $this->logInfo(Carbon::now()->toDateTimeString());

        return response()->json($results->getData());
    }
}
