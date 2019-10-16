<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Characters\CharacterProvider;
use Symfony\Component\HttpFoundation\Tests\JsonResponseTest;

class CharactersController extends RestApiController
{
    /**
     * @param int $id
     * @param CharacterProvider $characterProvider
     * @return JsonResponse
     */
    public function show(
        int $id,
        CharacterProvider $characterProvider
    ): JsonResponse
    {
        try {
            $results = $characterProvider->show($id);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json($results);
    }
}
