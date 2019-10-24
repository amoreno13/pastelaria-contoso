<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Services\PastryService;
use App\Http\Requests\StorePastry;
use App\Http\Requests\UpdatePastry;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\Interfaces\PastryRepositoryInterface;

class PastryController extends Controller
{
    use HttpResponse;
    
    protected $pastryService;
    protected $pastryRepository;

    public function __construct(PastryService $pastryService,
                                PastryRepositoryInterface $pastryRepository) {

        $this->pastryService = $pastryService;
        $this->pastryRepository = $pastryRepository;        
    }

    public function index() {

        $result = $this->pastryRepository->paginate(config('settings.pageSize'));

        return $this->showResponse($result);
    }

    public function show($pastry) {

        try{
            $result = $this->pastryRepository->findByID($pastry);
        
            return $this->showResponse($result);
        }catch(ModelNotFoundException $ex){

            return $this->showResponse(['message' => 'Pastry not found.'], 404);
        }
    }
    
    public function update($pastry, UpdatePastry $request) {

        try{
            $result = $this->pastryService->update($pastry, $request->all());

            return $this->showResponse($result);
            
        }catch(ModelNotFoundException $ex){

            return $this->showResponse(['message' => 'Pastry not found.'], 404);
        }
    }
    
    public function store(StorePastry $request) {
        
        $result = $this->pastryService->create($request->all());

        return $this->showResponse($result);
    }
    
    public function destroy($pastry, Request $request) {
        
        $result = $this->pastryRepository->delete($pastry);

        return $this->showResponse(['success' => $result]);
    }
}
