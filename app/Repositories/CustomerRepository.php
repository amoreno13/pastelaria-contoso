<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerRepository extends RepositoryBase implements CustomerRepositoryInterface
{
    public function __construct(Customer $model) {
        $this->model = $model;
    }
}