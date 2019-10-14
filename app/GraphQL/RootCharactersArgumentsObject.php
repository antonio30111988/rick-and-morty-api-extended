<?php

namespace GraphQL\SchemaObject;

class RootCharactersArgumentsObject extends ArgumentsObject
{
    protected $page;
    protected $filter;

    public function setPage($page)
    {
        $this->page = $page;
    
        return $this;
    }

    public function setFilter(FilterCharacterInputObject $filterCharacterInputObject)
    {
        $this->filter = $filterCharacterInputObject;
    
        return $this;
    }
}