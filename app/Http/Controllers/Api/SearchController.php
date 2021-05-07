<?php

namespace App\Http\Controllers\Api;
use App\Repositories\Region\RegionRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{


    private $regionRepository;

    public function __construct(RegionRepositoryInterface $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function getResults()
    {
        return  isset($_GET['query']) && $_GET['query']!='' ?  $this->regionRepository->searchRepository($_GET['query']) : ["data"=>[]];

    }
}
