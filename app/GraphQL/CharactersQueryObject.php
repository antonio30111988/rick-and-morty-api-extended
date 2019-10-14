<?php

namespace GraphQL\SchemaObject;

class CharactersQueryObject extends QueryObject
{
    const OBJECT_NAME = "Characters";

    public function selectInfo(CharactersInfoArgumentsObject $argsObject = null)
    {
        $object = new InfoQueryObject("info");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectResults(CharactersResultsArgumentsObject $argsObject = null)
    {
        $object = new CharacterQueryObject("results");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }
}