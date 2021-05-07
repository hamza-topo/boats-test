<?php

namespace App\Repositories\Region;

interface RegionRepositoryInterface
{
    /**
     * Find the distination with the given query.
     * @param string $query
     * @return mixed
     */
  public function searchRepository($query);

}
