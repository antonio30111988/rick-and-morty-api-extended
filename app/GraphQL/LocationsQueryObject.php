<?php

namespace GraphQL\SchemaObject;

class LocationsQueryObject extends QueryObject
{
    const OBJECT_NAME = "Locations";

    public function selectInfo(LocationsInfoArgumentsObject $argsObject = null)
    {
        $object = new InfoQueryObject("info");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectResults(LocationsResultsArgumentsObject $argsObject = null)
    {
        $object = new LocationQueryObject("results");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }
}