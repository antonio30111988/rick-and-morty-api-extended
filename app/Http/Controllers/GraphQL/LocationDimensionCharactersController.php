<?php

namespace App\Http\Controllers\GraphQL;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetLocationDimensionCharactersQuery;
use Carbon\Carbon;
use GraphQL\Exception\QueryError;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LocationDimensionCharactersController extends GraphQLController
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
        } catch (QueryError $exception) {
            $this->logError($exception->getErrorDetails());
            exit;
        }
        $results->reformatResults(true);

        $this->logInfo(Carbon::now()->toDateTimeString());

        return response()->json($results->getData());
    }
}
