<?php

namespace GraphQL\SchemaObject;

class InfoQueryObject extends QueryObject
{
    const OBJECT_NAME = "Info";

    public function selectCount()
    {
        $this->selectField("count");
    
        return $this;
    }

    public function selectPages()
    {
        $this->selectField("pages");
    
        return $this;
    }

    public function selectNext()
    {
        $this->selectField("next");
    
        return $this;
    }

    public function selectPrev()
    {
        $this->selectField("prev");
    
        return $this;
    }
}