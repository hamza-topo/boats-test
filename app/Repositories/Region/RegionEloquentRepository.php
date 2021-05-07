<?php

namespace App\Repositories\Region;

use App\Http\Resources\RegionResource;
use App\Repositories\EloquentRepository;
use App\Models\Region;  
class RegionEloquentRepository extends EloquentRepository implements RegionRepositoryInterface
{
    /**
     * Get model.
     *
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Region::class;
    }

    /**
     * Find the distination with the given query.
     *
     * @param string $query
     * @return mixed
     */
    public function searchRepository($query)
    {
       
      $regions = Region::query()
      ->whereHas('bases',function(\Illuminate\Database\Eloquent\Builder $builder) use ($query){
          return $builder->where('name_fr', 'LIKE','%'.$query.'%');
        })
      ->orWhere('name_fr','LIKE','%'.$query.'%')
      ->get()->take(10);
      return  RegionResource::collection($regions);
    }
    
  
}
