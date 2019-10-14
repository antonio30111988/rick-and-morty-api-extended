<?php

namespace GraphQL\SchemaObject;

class RootCharacterArgumentsObject extends ArgumentsObject
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
}