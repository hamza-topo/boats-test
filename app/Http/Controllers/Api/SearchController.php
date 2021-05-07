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
        isset($_GET['query']) ? $query = $_GET['query'] : $query = '';

        return  $this->regionRepository->searchRepository($query);

        
       
    }
}
