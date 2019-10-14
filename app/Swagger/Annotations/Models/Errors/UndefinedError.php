<?php
declare(strict_types=1);
/**
 * @OA\Schema(
 *  schema="UndefinedError",
 *  @OA\Property(property="error",type="object",
 *      @OA\Property(property="code", description="Error code", type="integer", default="500"),
 *      @OA\Property(property="message", description="Error Message", type="string")
 *  )
 * )
 */
