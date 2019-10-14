<?php

namespace GraphQL\SchemaObject;

class RootQueryObject extends QueryObject
{
    const OBJECT_NAME = "query";

    public function selectCharacter(RootCharacterArgumentsObject $argsObject = null)
    {
        $object = new CharacterQueryObject("character");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectCharacters(RootCharactersArgumentsObject $argsObject = null)
    {
        $object = new CharactersQueryObject("characters");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectLocation(RootLocationArgumentsObject $argsObject = null)
    {
        $object = new LocationQueryObject("location");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectLocations(RootLocationsArgumentsObject $argsObject = null)
    {
        $object = new LocationsQueryObject("locations");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectEpisode(RootEpisodeArgumentsObject $argsObject = null)
    {
        $object = new EpisodeQueryObject("episode");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectEpisodes(RootEpisodesArgumentsObject $argsObject = null)
    {
        $object = new EpisodesQueryObject("episodes");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }
}