<?php

namespace App\GraphQL\Queries;

use GraphQL\QueryBuilder\QueryBuilder;
use GraphQL\QueryBuilder\QueryBuilderInterface;

class GetCharacterQuery
{
    /**
     * @return QueryBuilderInterface
     */
    public function query(): QueryBuilderInterface
    {
        return  (new QueryBuilder('character'))
            ->setVariable('id', 'ID', true)
            ->setArgument('id' , '$id')
           // ->setArgument('where', new RawObject('{id: $id}'))
            //  ->setArgument('name', 'Pikachu')
            ->selectField('id')
            ->selectField('name')
            ->selectField('type')
            ->selectField('species')
            ->selectField('gender')
            ->selectField(
                (new QueryBuilder('location'))
                    ->selectField('name')
                    ->selectField('id')
            )
            ->selectField(
                (new QueryBuilder('origin'))
                    ->selectField('id')
                    ->selectField('name')
            );
    }
}