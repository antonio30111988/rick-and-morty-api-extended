<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use App\Http\Resources\EpisodeCharacters;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Characters\CharacterProvider;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Episodes\EpisodeProvider;

class EpisodeCharactersController extends RestApiController
{
    /**
     * @param int $id
     * @param EpisodeProvider $episodeService
     * @return JsonResource
     */
    public function __invoke(
        int $id,
        EpisodeProvider $episodeService,
        CharacterProvider $characterService
    ): JsonResource
    {
        try {
            $episode = $episodeService->show($id);

            /** @var Collection $characters */
            $episodeCharacters = $characterService->all(['ids' => $episode->getCharacterIds()]);
            return response()->json($episodeCharacters);

            return new EpisodeCharacters($episode);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
