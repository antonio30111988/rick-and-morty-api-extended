<?php

namespace GraphQL\SchemaObject;

class FilterLocationInputObject extends InputObject
{
    protected $name;
    protected $type;
    protected $dimension;

    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    public function setDimension($dimension)
    {
        $this->dimension = $dimension;
    
        return $this;
    }
}