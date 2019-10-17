<?php
declare(strict_types=1);


/**
 * @OA\Get(
 *   path="/api/v1/episodes/{id}/characters",
 *   tags={"Episode Characters"},
 *   summary="Get episode by ID characters",
 *   @OA\Parameter(name="id", in="path", description="The ID of the episode", required=true,
 *     @OA\Schema(
 *             type="integer",
 *             format="int64"
 *     )
 *   ),
 *   @OA\Response(response=200, description="Json response", @OA\JsonContent(ref="#/components/schemas/EpisodeCharacter")),
 *   @OA\Response(response=401, description="Unauthorised", @OA\JsonContent(ref="#/components/schemas/UnAuthorised")),
 *   @OA\Response(response=404, description="Permission not found",
 *     @OA\JsonContent(ref="#/components/schemas/NotFound"))
 * )
 */

