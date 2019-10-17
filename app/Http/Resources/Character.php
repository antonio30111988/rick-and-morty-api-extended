<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Character extends JsonResource
{
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'status' => $this->getStatus(),
            'species' => $this->getSpecies(),
            'gender' => $this->getGender(),
            'origin' => $this->getOrigin(),
            'location' => $this->getLocation(),
            'image' => $this->getImage(),
            'episodes' => $this->getEpisodes(),
            'url' => $this->getUrl()
        ];
    }

}