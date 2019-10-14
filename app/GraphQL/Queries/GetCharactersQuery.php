<?php

namespace App\GraphQL\Queries;

use GraphQL\QueryBuilder\QueryBuilder;
use GraphQL\QueryBuilder\QueryBuilderInterface;

class GetCharactersQuery
{
    /**
     * @return QueryBuilderInterface
     */
    public function query(): QueryBuilderInterface
    {
        return  (new QueryBuilder('pokemon'))
            ->setArgument('name', 'Pikachu')
            ->selectField('id')
            ->selectField('number')
            ->selectField('name')
            ->selectField(
                (new QueryBuilder('attacks'))
                    ->selectField(
                        (new QueryBuilder('special'))
                            ->selectField('name')
                            ->selectField('type')
                            ->selectField('damage')
                    )
            )
            ->selectField(
                (new QueryBuilder('evolutions'))
                    ->selectField('id')
                    ->selectField('name')
                    ->selectField('number')
                    ->selectField(
                        (new QueryBuilder('attacks'))
                            ->selectField(
                                (new QueryBuilder('fast'))
                                    ->selectField('name')
                                    ->selectField('type')
                                    ->selectField('damage')
                            )
                    )
            );
    }
}