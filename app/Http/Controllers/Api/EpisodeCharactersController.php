<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Characters\CharacterProvider;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Episodes\EpisodeProvider;

class EpisodeCharactersController extends RestApiController
{
    /**
     * @param int $id
     * @param EpisodeProvider $episodeService
     * @param CharacterProvider $characterService
     * @return JsonResponse
     */
    public function __invoke(
        int $id,
        EpisodeProvider $episodeService,
        CharacterProvider $characterService
    ): JsonResponse
    {
        try {
            $episode = $episodeService->show($id);

            /** @var Collection $characters */
            $episodeCharacters = $characterService->all(['ids' => $episode->getCharacterIds()]);

            return response()->json($episodeCharacters);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
