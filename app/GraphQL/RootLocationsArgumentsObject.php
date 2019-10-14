<?php

namespace GraphQL\SchemaObject;

class RootLocationsArgumentsObject extends ArgumentsObject
{
    protected $page;
    protected $filter;

    public function setPage($page)
    {
        $this->page = $page;
    
        return $this;
    }

    public function setFilter(FilterLocationInputObject $filterLocationInputObject)
    {
        $this->filter = $filterLocationInputObject;
    
        return $this;
    }
}