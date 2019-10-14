<?php

namespace GraphQL\SchemaObject;

class FilterCharacterInputObject extends InputObject
{
    protected $name;
    protected $status;
    protected $species;
    protected $type;
    protected $gender;

    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }
}