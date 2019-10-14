<?php

namespace GraphQL\SchemaObject;

class FilterEpisodeInputObject extends InputObject
{
    protected $name;
    protected $episode;

    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    public function setEpisode($episode)
    {
        $this->episode = $episode;
    
        return $this;
    }
}