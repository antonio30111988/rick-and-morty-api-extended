<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use App\Http\Resources\Character;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Characters\CharacterProvider;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Episodes\EpisodeProvider;

class CharactersController extends RestApiController
{
    /**
     * @param int $id
     * @param CharacterProvider $characterService
     * @param EpisodeProvider $episodeService
     * @return JsonResponse
     */
    public function show(
        int $id,
        CharacterProvider $characterService,
        EpisodeProvider $episodeService
    ): JsonResponse
    {
        try {
            $character = $characterService->show($id);
            $character->setEpisodes($episodeService->all(['ids' => $character->getEpisodeIds()]));

            return response()->json(new Character($character));
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
