<?php

namespace GraphQL\SchemaObject;

class EpisodesQueryObject extends QueryObject
{
    const OBJECT_NAME = "Episodes";

    public function selectInfo(EpisodesInfoArgumentsObject $argsObject = null)
    {
        $object = new InfoQueryObject("info");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectResults(EpisodesResultsArgumentsObject $argsObject = null)
    {
        $object = new EpisodeQueryObject("results");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }
}