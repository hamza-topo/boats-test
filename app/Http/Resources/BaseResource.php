<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name_fr'    => $this->name_fr,
            'base_type'  => $this->baseType->name,
            'type_id'    => $this->type,
            'contry_name'=> $this->region->name_fr,
            'boats'      => $this->region->boat_count
        ];
    }
}
