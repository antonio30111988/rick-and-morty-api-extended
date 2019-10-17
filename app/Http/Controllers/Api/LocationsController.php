<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use App\Http\Requests\GetDimensionCharacters;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Characters\CharacterProvider;
use RickAndMortyApiClient\Contracts\Api\RickAndMorty\Locations\LocationProvider;
use RickAndMortyApiClient\Services\Api\RickAndMorty\Locations\Location;

class LocationsController extends RestApiController
{
    /**
     * @var LocationProvider
     */
    private $locationService;
    /**
     * @var CharacterProvider
     */
    private $characterService;

    /**
     * LocationsController constructor.
     * @param LocationProvider $locationService
     * @param CharacterProvider $characterService
     */
    public function __construct(LocationProvider $locationService, CharacterProvider $characterService)
    {
        $this->locationService = $locationService;
        $this->characterService = $characterService;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getLocationCharacters(int $id): JsonResponse
    {
        try {
            /** @var Location $location */
            $location = $this->locationService->show($id);

            /** @var Collection $characters */
            $locationCharacters = $this->characterService->all(['ids' => $location->getCharacterIds()]);

            return response()->json($locationCharacters);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    /**
     * @param GetDimensionCharacters $request
     * @return JsonResponse
     */
    public function getLocationDimensionCharacters(GetDimensionCharacters $request): JsonResponse
    {
        try {
            $dimensions = $this->locationService->getLocationByDimension([
                'filters' => $request->toArray()
            ]);

            /** @var Collection $characters */
            $dimensionCharacters = $this->characterService->all(['ids' => $dimensions[0]->getCharacterIds()]);

            return response()->json($dimensionCharacters);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
