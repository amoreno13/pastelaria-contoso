<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class RepositoryBase
{
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
    
    public function create(array $data = []) {

        return $this->model->create($data);
    }

    public function findByID($id, $fail = true) {

        if ($fail) 
            return $this->model->findOrFail($id);
        
        return $this->model->find($id);
    }

    public function getAll() {

        return $this->model->get();
    }

    public function update($id, array $data = []) {

        $model = $this->model->where($this->model->getKeyName(), $id)->first();
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete($id) {

        return $this->model->where($this->model->getKeyName(), $id)->delete();
    }
    
    public function pluck($column, $key = null) {

        return $this->model->lists($column, $key);
    }

    public function paginate($perPage) {
        
        return $this->model->paginate($perPage);
    }
}