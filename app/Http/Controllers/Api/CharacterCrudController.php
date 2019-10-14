<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Traits\CrudControllerTrait;
use App\Http\Controllers\GraphQL\RestApiController;

class CharacterCrudController extends RestApiController
{
    use CrudControllerTrait;
}
