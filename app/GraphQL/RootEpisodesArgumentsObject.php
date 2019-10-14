<?php

namespace GraphQL\SchemaObject;

class RootEpisodesArgumentsObject extends ArgumentsObject
{
    protected $page;
    protected $filter;

    public function setPage($page)
    {
        $this->page = $page;
    
        return $this;
    }

    public function setFilter(FilterEpisodeInputObject $filterEpisodeInputObject)
    {
        $this->filter = $filterEpisodeInputObject;
    
        return $this;
    }
}