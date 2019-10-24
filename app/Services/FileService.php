<?php

namespace App\Services;

Class FileService
{   
    public function save($file, $path, $fileName = null){

        $fileName = $this->generateFileName($file, $fileName);

        $file->move(public_path($path), $fileName);

        return $fileName;
    }

    private function generateFileName($file, $fileName) {        

        if($fileName) return $fileName;

        return uniqid('imagem-') . '.' . $file->getClientOriginalExtension();
    }
}