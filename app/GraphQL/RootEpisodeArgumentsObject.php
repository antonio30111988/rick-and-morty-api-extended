<?php

namespace GraphQL\SchemaObject;

class RootEpisodeArgumentsObject extends ArgumentsObject
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
}