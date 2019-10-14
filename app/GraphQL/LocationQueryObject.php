<?php

namespace GraphQL\SchemaObject;

class LocationQueryObject extends QueryObject
{
    const OBJECT_NAME = "Location";

    public function selectId()
    {
        $this->selectField("id");
    
        return $this;
    }

    public function selectName()
    {
        $this->selectField("name");
    
        return $this;
    }

    public function selectType()
    {
        $this->selectField("type");
    
        return $this;
    }

    public function selectDimension()
    {
        $this->selectField("dimension");
    
        return $this;
    }

    public function selectResidents(LocationResidentsArgumentsObject $argsObject = null)
    {
        $object = new CharacterQueryObject("residents");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectCreated()
    {
        $this->selectField("created");
    
        return $this;
    }
}