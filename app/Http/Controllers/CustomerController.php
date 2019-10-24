<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Interfaces\CustomerRepositoryInterface;

class CustomerController extends Controller
{
    use HttpResponse;

    protected $customerRepository;
    
    public function __construct(CustomerRepositoryInterface $customerRepository) {
        $this->customerRepository = $customerRepository;        
    }

    public function index() {
        
        $result = $this->customerRepository->paginate(config('settings.pageSize'));

        return $this->showResponse($result);
    }

    public function show($customer) {

        try{
            $result = $this->customerRepository->findByID($customer);

            return $this->showResponse($result);

        }catch(ModelNotFoundException $ex){ 
                       
            return $this->showResponse(['message' => 'Customer not found.'], 404);
        }
    }
    
    public function update($customer, UpdateCustomer $request) {
        
        try{
            $result = $this->customerRepository->update($customer, $request->all());

            return $this->showResponse($result);
            
        }catch(ModelNotFoundException $ex){

            return $this->showResponse(['message' => 'Customer not found.'], 404);
        }
    }
    
    public function store(StoreCustomer $request) {        
        
        $result = $this->customerRepository->create($request->all());

        return $this->showResponse($result);
    }
    
    public function destroy($customer, Request $request) {
        
        $result = $this->customerRepository->delete($customer);

        return $this->showResponse(['success' => $result]);
    }
}
