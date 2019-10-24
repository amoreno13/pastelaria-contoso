<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrder;
use App\Http\Requests\UpdateOrder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderController extends Controller
{
    use HttpResponse;

    protected $orderRepository;
    
    public function __construct(OrderRepositoryInterface $orderRepository) {
        $this->orderRepository = $orderRepository;        
    }

    public function index() {
        
        $relations = ['customer', 'pastels'];

        $result = $this->orderRepository->paginate(
            config('settings.pageSize'),
            $relations
        );

        return $this->showResponse($result);
    }

    public function show($order) {
        
        $relations = ['customer', 'pastels'];

        try{
            $result = $this->orderRepository->findByID(
                $order,
                $relations
            );

            return $this->showResponse($result);
        }catch(ModelNotFoundException $ex) {

            return $this->showResponse(['message' => 'Order not found.'], 404);
        }
    }
    
    public function update($order, UpdateOrder $request) {
        
        try{
            $result = $this->orderRepository->update($order, $request->all());

            return $this->showResponse($result);

        }catch(ModelNotFoundException $ex){

            return $this->showResponse(['message' => 'Order not found.'], 404);
        }
    }
    
    public function store(StoreOrder $request) {
        
        $result = $this->orderRepository->create($request->all());

        return $this->showResponse($result);
    }
    
    public function destroy($order, Request $request) {
        
        $result = $this->orderRepository->delete($order);

        return $this->showResponse(['success' => $result]);
    }
}
