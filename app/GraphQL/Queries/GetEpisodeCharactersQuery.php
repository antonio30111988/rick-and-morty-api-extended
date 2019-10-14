<?php

namespace App\GraphQL\Queries;

use GraphQL\QueryBuilder\QueryBuilder;
use GraphQL\QueryBuilder\QueryBuilderInterface;

class GetEpisodeCharactersQuery
{
    /**
     * @return QueryBuilderInterface
     */
    public function query(): QueryBuilderInterface
    {
        return  (new QueryBuilder('episode'))
            ->setVariable('id', 'ID', true)
            ->setArgument('id' , '$id')
            ->selectField(
                (new QueryBuilder('characters'))
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