<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    function create(array $data = []);

    function findByID($id, $fail = true);    
    
    function getAll();    
    
    function update($id, array $data = []);       
    
    function delete($id);
        
    function pluck($column, $key = null);

    function paginate($per_page);
     
}