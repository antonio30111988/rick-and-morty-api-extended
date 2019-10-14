<?php
declare(strict_types=1);

/**
 * @OA\Get(
 *   path="/graphql/v1/character/{id}",
 *   tags={"Character Overview"},
 *   summary="Get character by id",
 *   @OA\Parameter(name="id", in="path", description="The ID of the character", required=true,
 *     @OA\Schema(
 *             type="integer",
 *             format="int64"
 *     )
 *   ),
 *   @OA\Response(response=200, description="Json response", @OA\JsonContent(ref="#/components/schemas/Character")),
 *   @OA\Response(response=401, description="Unauthorised", @OA\JsonContent(ref="#/components/schemas/UnAuthorised")),
 *   @OA\Response(response=404, description="Permission not found",
 *     @OA\JsonContent(ref="#/components/schemas/NotFound"))
 * )
 */
