<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository extends RepositoryBase implements OrderRepositoryInterface
{
    public function __construct(Order $model) {
        $this->model = $model;
    }

    public function create(array $data = []) {        
        $order = $this->model->create($data);
        $order->pastels()->sync($data['pastry_ids']);
        
        return $order->load(['customer', 'pastels']);
    }

    public function update($id, array $data = []) {

        $model = $this->model->findOrFail($id);
        $model->fill($data);
        $model->save();
        $model->pastels()->sync($data['pastry_ids']);

        return $model->load(['customer', 'pastels']);
    }
}