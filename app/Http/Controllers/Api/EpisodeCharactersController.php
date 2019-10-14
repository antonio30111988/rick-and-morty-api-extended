<?php

namespace App\Http\Controllers\Api;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetEpisodeCharactersQuery;
use App\Http\Controllers\GraphQL\RestApiController;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class EpisodeCharactersController extends RestApiController
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
        } catch (\Exception $exception) {
            $this->logError($exception);
            exit;
        }
        $results->reformatResults(true);

        $this->logInfo(Carbon::now()->toDateTimeString());

        return response()->json($results->getData());
    }
}
