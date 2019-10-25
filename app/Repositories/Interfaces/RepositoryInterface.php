<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    function create(array $data = []);

    function findByID($id, $relations = null, $fail = true);    
    
    function getAll($relations = null);    
    
    function update($id, array $data = []);       
    
    function delete($id);

    function paginate($perPage, $relations = null);
     
}