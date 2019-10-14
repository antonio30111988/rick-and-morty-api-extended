<?php

namespace GraphQL\SchemaObject;

class EpisodeQueryObject extends QueryObject
{
    const OBJECT_NAME = "Episode";

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

    public function selectAirDate()
    {
        $this->selectField("air_date");
    
        return $this;
    }

    public function selectEpisode()
    {
        $this->selectField("episode");
    
        return $this;
    }

    public function selectCharacters(EpisodeCharactersArgumentsObject $argsObject = null)
    {
        $object = new CharacterQueryObject("characters");
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