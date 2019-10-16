<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\GraphQL\RestApiController;
use App\Http\Requests\GetDimensionCharacters;
use App\Http\Resources\CharacterCollection;
use App\Http\Resources\DimensionCharacters;
use Illuminate\Http\Resources\Json\JsonResource;
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
     * @return JsonResource
     */
    public function getLocationCharacters(int $id)
    {
        try {
            /** @var Location $location */
            $location = $this->locationService->show($id);
         //   $characterIds = $location->getCharacterIds();
//            $characterIds = collect($location->getResidents())->map(function ($item, $key) {
//                return (int)str_replace("https://rickandmortyapi.com/api/character/", "", $item);
//            })->toArray();

            /** @var Collection $characters */
            $locationCharacters = $this->characterService->all(['ids' => $location->getCharacterIds()]);

            return response()->json($locationCharacters);

            return CharacterCollection::collection($location->getCharacters());
           // return new LocationCharacters($location->getCharacters());
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
     * @return JsonResource
     */
    public function getLocationDimensionCharacters(GetDimensionCharacters $request): JsonResource
    {
        try {
            $results = $this->locationService->getLocationByDimension([
                'filters' => $request->toArray()
            ]);

            return new DimensionCharacters($results[0]);
        } catch (\Exception $exception) {
            $this->logError($exception);
            return $this->errorResponse(
                $exception,
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}
