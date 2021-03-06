<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
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
            'bases'      => BaseResource::collection($this->bases),
            'boat_count' => $this->boat_count,
        ];
    }
}
