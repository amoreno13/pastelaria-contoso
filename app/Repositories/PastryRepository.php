<?php

namespace App\Repositories;

use App\Models\Pastry;
use App\Repositories\Interfaces\PastryRepositoryInterface;

class PastryRepository extends RepositoryBase implements PastryRepositoryInterface
{
    public function __construct(Pastry $model) {
        $this->model = $model;
    }
}