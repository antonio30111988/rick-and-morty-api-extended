<?php
declare(strict_types=1);


/**
 * @OA\Get(
 *   path="/api/v1/location/{id}/characters",
 *   tags={"Location characters"},
 *   summary="Get location by ID characters",
 *   @OA\Parameter(name="id", in="path", description="The ID of the location", required=true,
 *     @OA\Schema(
 *             type="integer",
 *             format="int64"
 *     )
 *   ),
 *   @OA\Response(response=200, description="Json response", @OA\JsonContent(ref="#/components/schemas/LocationCharacter")),
 *   @OA\Response(response=401, description="Unauthorised", @OA\JsonContent(ref="#/components/schemas/UnAuthorised")),
 *   @OA\Response(response=404, description="Permission not found",
 *     @OA\JsonContent(ref="#/components/schemas/NotFound"))
 * )
 */

