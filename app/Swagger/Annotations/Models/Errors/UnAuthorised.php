<?php
declare(strict_types=1);
/**
 * @OA\Schema(
 *   schema="UnAuthorised",
 *   @OA\Property(property="error",type="object",
 *      @OA\Property(property="code", description="Error code", type="integer", default="401"),
 *      @OA\Property(property="message", description="Error Message", type="string")
 *  )
 * )
 */
