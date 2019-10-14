<?php

namespace App\GraphQL\Queries;

use GraphQL\QueryBuilder\QueryBuilder;
use GraphQL\QueryBuilder\QueryBuilderInterface;

class GetLocationCharactersQuery
{
    /**
     * @return QueryBuilderInterface
     */
    public function query(): QueryBuilderInterface
    {
        return  (new QueryBuilder('location'))
            ->setVariable('id', 'ID', true)
            ->setArgument('id' , '$id')
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
            );
    }
}