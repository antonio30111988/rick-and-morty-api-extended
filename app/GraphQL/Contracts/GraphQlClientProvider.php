<?php

namespace App\GraphQL\Contracts;

use GraphQL\Exception\QueryError;
use GraphQL\Query;
use GraphQL\QueryBuilder\QueryBuilderInterface;
use GraphQL\Results;

interface GraphQlClientProvider
{
    /**
     * @param Query|QueryBuilderInterface $query
     * @param bool                        $resultsAsArray
     * @param array                       $variables
     *
     * @return Results
     * @throws QueryError
     */
    public function runQuery($query, bool $resultsAsArray = false, array $variables = []): Results;

    /**
     * @param string $queryString
     * @param bool   $resultsAsArray
     * @param array  $variables
     *
     * @return Results
     * @throws QueryError
     */
    public function runRawQuery(string $queryString, $resultsAsArray = false, array $variables = []): Results;
}