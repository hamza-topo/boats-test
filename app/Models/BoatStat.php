<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoatStat extends Model
{
    public $timestamps = false;

    protected $fillable = [ 'region_id' , 'typ_id' , 'boat_count' , 'min_price' ];
   
}
