<?php declare(strict_types=1);

namespace App\Http\Controllers\GraphQL;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetLocationCharactersQuery;
use Carbon\Carbon;
use Illuminate\Http\Response;
use GraphQL\Exception\QueryError;
use Illuminate\Http\JsonResponse;

class LocationCharactersController extends GraphQLController
{
    /**
     *
     * @param int                        $id
     * @param GraphQlClientProvider      $client
     * @param GetLocationCharactersQuery $queryBuilder
     *
     * @return JsonResponse
     */
    public function __invoke(
        int $id,
        GraphQlClientProvider $client,
        GetLocationCharactersQuery $queryBuilder
    ): JsonResponse
    {
        try {
            $results = $client->runQuery(
                $queryBuilder->query(),
                true,
                ['id' => $id]
            );
        } catch (QueryError $exception) {
            $this->logError($exception->getErrorDetails());
            return $this->graphQlErrorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        $results->reformatResults(true);

        return response()->json($results->getData());
    }
}
