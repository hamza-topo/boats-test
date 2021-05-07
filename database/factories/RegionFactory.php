<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Region::class, function (Faker $faker) {

    $name   =   'xxx';
    return [
        'boat_count'          =>   $faker->randomDigitNot(0),
        'name_fr'             =>   $name. '_fr',
        'name_uk'             =>   $name. '_uk',
        'name_de'             =>   $name. '_de',
        'name_it'             =>   $name. '_it',
        'name_es'             =>   $name. '_es',
        'name_be'             =>   $name. '_be',
    ];

});
