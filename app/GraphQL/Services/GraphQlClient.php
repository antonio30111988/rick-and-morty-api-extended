<?php

namespace App\GraphQL\Services;

use App\GraphQL\Contracts\GraphQlClientProvider;
use GraphQL\Client;

/**
 * Class to deal with the GraphQlApi API
 *
 * C/p from https://rickandmortyapi.com/graphql/
 */
class GraphQlClient extends Client implements GraphQlClientProvider
{

}