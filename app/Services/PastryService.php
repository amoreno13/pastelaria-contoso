<?php

namespace App\Services;

use App\Repositories\Interfaces\PastryRepositoryInterface;

Class PastryService
{    
    protected $fileService;
    protected $pastryRepository;    

    public function __construct(FileService $fileService, PastryRepositoryInterface $pastryRepository) {
        $this->fileService = $fileService;
        $this->pastryRepository = $pastryRepository;        
    }
    
    public function create(array $data) {
       
        $data['image'] = $this->fileService->save($data['file'], config('settings.pastryImgPath'));

        return $this->pastryRepository->create($data);
    }

    public function update($id, array $data) {

        if($data['file'])
            $data['image'] = $this->fileService->save($data['file'], config('settings.pastryImgPath'));
        
        return $this->pastryRepository->update($id, $data);
    }
}