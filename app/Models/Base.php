<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'region_id' , 'type' , 'main' , 'boat_count' , 'name_fr' , 'name_uk' , 'name_de' , 'name_it' , 'name_es' , 'name_be' ];

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id');
    }
}
