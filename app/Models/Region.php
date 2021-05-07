<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'boat_count' , 'name_fr' , 'name_uk' , 'name_de' , 'name_it' , 'name_es' , 'name_be' ];

    public function bases()
    {
        return $this->hasMany(Base::class,'region_id');
    }
  
}
