<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BaseType;
use App\Models\Region;
use App\Models\Base;
use App\Models\BoatStat;

class SeedJsonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SeedJsonData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $json = file_get_contents(public_path('destinations.json'));

        $objs = json_decode($json,true);

        //insert base_types data
        foreach($objs['base_types'] as $baseType)
                BaseType::create([
                    'name'=>$baseType['name']
                ]);

        //insert regions data
        foreach($objs['regions'] as $region)
        {
            $newRegion = Region::create([
                'boat_count' => $region['boat_count'],
                'name_fr'    => $region['name_fr'],
                'name_uk'    => $region['name_uk'], 
                'name_de'    => $region['name_de'], 
                'name_it'    => $region['name_it'], 
                'name_es'    => $region['name_es'], 
                'name_be'    => $region['name_be'],
                ]
            );

              if(isset($region['bases']) && count($region['bases'])>0)
              {
                        //insert bases data
                        foreach($region['bases'] as $base)
                        {
                        Base::create([
                            'region_id'     => $newRegion->id,
                            'type'          => $base['type'],
                            'main'          => $base['main'],
                            'boat_count'    => $base['boat_count'],
                            'name_fr'       => $base['name_fr'],
                            'name_uk'       => $base['name_uk'],
                            'name_de'       => $base['name_de'],
                            'name_it'       => $base['name_it'],
                            'name_es'       => $base['name_es'],
                            'name_be'       => $base['name_be']
                            ]);
                        }
              }
             

              if(isset($region['boat_stats']) && count($region['boat_stats'])>0)
              {
                        foreach($region['boat_stats'] as $boatStat)
                        {
                        BoatStat::create([
                            'region_id'  =>$newRegion->id,
                            'typ_id'     => $boatStat['typ_id'],
                            'boat_count'  => $boatStat['boat_count'],
                            'min_price'   => $boatStat['min_price'],
                        ]);
                        }
              }
              
              
        }
    }
}
