<?php

namespace App\Http\Controllers\GraphQL;

use App\Traits\GraphQlLogTrait;
use Illuminate\Routing\Controller as BaseController;

class GraphQLController extends BaseController
{
    use GraphQlLogTrait;
}
