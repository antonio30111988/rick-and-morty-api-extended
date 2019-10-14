<?php

namespace App\GraphQL\Queries;

use GraphQL\Query;
use GraphQL\QueryBuilder\QueryBuilder;
use GraphQL\QueryBuilder\QueryBuilderInterface;
use GraphQL\RawObject;
use GraphQL\Variable;

class GetLocationDimensionCharactersQuery
{
    /**
     * @return QueryBuilderInterface
     */
    public function query(): QueryBuilderInterface
    {
        return  (new QueryBuilder('locations'))
            ->setVariable('dimension', 'String', true)
            ->setArgument('filter', new RawObject('{dimension: $dimension}'))
            ->selectField(
                (new QueryBuilder('results'))
                    ->selectField(
                        (new QueryBuilder('residents'))
                            ->selectField('id')
                            ->selectField('name')
                            ->selectField('type')
                            ->selectField('species')
                            ->selectField('gender')
                            ->selectField('image')
                            ->selectField('status')
                            ->selectField(
                                (new QueryBuilder('location'))
                                    ->selectField('id')
                                    ->selectField('name')
                            )
                            ->selectField(
                                (new QueryBuilder('origin'))
                                    ->selectField('id')
                                    ->selectField('name')
                            )
                    )
            );
    }
}