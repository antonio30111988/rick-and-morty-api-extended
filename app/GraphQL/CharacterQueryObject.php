<?php

namespace GraphQL\SchemaObject;

class CharacterQueryObject extends QueryObject
{
    const OBJECT_NAME = "Character";

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

    public function selectStatus()
    {
        $this->selectField("status");
    
        return $this;
    }

    public function selectSpecies()
    {
        $this->selectField("species");
    
        return $this;
    }

    public function selectType()
    {
        $this->selectField("type");
    
        return $this;
    }

    public function selectGender()
    {
        $this->selectField("gender");
    
        return $this;
    }

    public function selectOrigin(CharacterOriginArgumentsObject $argsObject = null)
    {
        $object = new LocationQueryObject("origin");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectLocation(CharacterLocationArgumentsObject $argsObject = null)
    {
        $object = new LocationQueryObject("location");
        if ($argsObject !== null) {
            $object->appendArguments($argsObject->toArray());
        }
        $this->selectField($object);
    
        return $object;
    }

    public function selectImage()
    {
        $this->selectField("image");
    
        return $this;
    }

    public function selectEpisode(CharacterEpisodeArgumentsObject $argsObject = null)
    {
        $object = new EpisodeQueryObject("episode");
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