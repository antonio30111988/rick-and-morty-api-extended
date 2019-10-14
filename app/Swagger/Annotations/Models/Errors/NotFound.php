<?php
declare(strict_types=1);
/**
 * @OA\Schema(
 *   schema="NotFound",
 *   @OA\Property(property="error",type="object",
 *      @OA\Property(property="code", description="Error code", type="integer", default="404"),
 *      @OA\Property(property="message", description="Error Message", type="string")
 *  )
 * )
 */
