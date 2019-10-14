<?php
declare(strict_types=1);
/**
 * @OA\Schema(
 *  schema="BadRequest",
 *  @OA\Property(property="error",type="object",
 *      @OA\Property(property="code", description="Error code", type="integer", default="400"),
 *      @OA\Property(property="message", description="Error Message", type="string"),
 *      @OA\Property(
 *              property="error_details",
 *             type="array",
 *             @OA\Items(type="string")
 *      )
 *  )
 * )
 */
