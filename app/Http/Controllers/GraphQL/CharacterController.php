<?php declare(strict_types=1);

namespace App\Http\Controllers\GraphQL;

use App\GraphQL\Contracts\GraphQlClientProvider;
use App\GraphQL\Queries\GetCharacterQuery;
use Illuminate\Http\Response;
use GraphQL\Exception\QueryError;
use Illuminate\Http\JsonResponse;

class CharacterController extends GraphQLController
{
    /**
     *
     * @param int                   $id
     * @param GraphQlClientProvider $client
     * @param GetCharacterQuery     $queryBuilder
     *
     * @return JsonResponse
     */
    public function __invoke(
        int $id,
        GraphQlClientProvider $client,
        GetCharacterQuery $queryBuilder
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
