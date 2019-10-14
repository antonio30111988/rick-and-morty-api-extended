<?php

namespace GraphQL\SchemaObject;

class RootLocationArgumentsObject extends ArgumentsObject
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
}