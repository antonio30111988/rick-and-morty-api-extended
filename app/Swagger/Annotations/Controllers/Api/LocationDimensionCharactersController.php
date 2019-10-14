<?php
declare(strict_types=1);


/**
 * @OA\Post(
 *   path="/api/v2/locations/characters/filter/dimension",
 *   tags={"Location Dimension Characters"},
 *   summary="Store invoice item",
 *   @OA\RequestBody(
 *       description="Input data format",
 *       @OA\Schema(
 *           type="array",
 *           ref="#/components/schemas/GetLocationDimensionCharacter"
 *       )
 *
 *   ),
 *   @OA\Response(response=200, description="Json response", @OA\JsonContent(ref="#/components/schemas/LocationDimensionCharacter")),
 *   @OA\Response(response=401, description="", @OA\JsonContent(ref="#/components/schemas/UnAuthorised"))
 * )
 */
