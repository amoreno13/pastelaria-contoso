<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class RepositoryBase
{
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }
    
    public function create(array $data = []) {

        return $this->model->create($data);
    }

    public function findByID($id, $relations = null, $fail = true) {

        $query = $this->model;

        if($relations)
            $query = $query->with($relations);

        if ($fail) 
            return $query->findOrFail($id);
        
        return $query->find($id);
    }

    public function getAll($relations = null) {

        $query = $this->model;

        if($relations)
            $query = $query->with($relations);

        return $query->get();
    }

    public function update($id, array $data = []) {

        $model = $this->model->findOrFail($id);
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function delete($id) {

        return $this->model->where($this->model->getKeyName(), $id)->delete();
    }

    public function paginate($perPage, $relations = null) {
        
        $query = $this->model;

        if($relations)
            $query = $query->with($relations);

        return $query->paginate($perPage);
    }
}