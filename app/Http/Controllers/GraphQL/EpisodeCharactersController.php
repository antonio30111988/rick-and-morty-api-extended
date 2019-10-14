<?php

namespace App\Http\Controllers\GraphQL;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetEpisodeCharactersQuery;
use Carbon\Carbon;
use GraphQL\Exception\QueryError;
use Illuminate\Http\JsonResponse;

class EpisodeCharactersController extends GraphQLController
{
    /**
     *
     * @param int                       $id
     * @param GraphQlClientProvider     $client
     * @param GetEpisodeCharactersQuery $queryBuilder
     *
     * @return JsonResponse
     */
    public function __invoke(
        int $id,
        GraphQlClientProvider $client,
        GetEpisodeCharactersQuery $queryBuilder
    ): JsonResponse {
        try {
            $results = $client->runQuery(
                $queryBuilder->query(),
                true,
                ['id' => $id]
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
