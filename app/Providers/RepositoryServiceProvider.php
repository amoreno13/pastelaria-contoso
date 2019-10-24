<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {        
        foreach(glob($this->filePattern()) as $file) {

            $className = $this->className($file);

            if($className == 'RepositoryBase')
                continue;
                
            $this->app->bind(
                $this->getNamespace($className, true), 
                $this->getNamespace($className)
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    private function repositoryPath() {
        
        $reflector = new \ReflectionClass(\App\Repositories\RepositoryBase::class);
        
        return dirname($reflector->getFileName());
    }

    private function filePattern() {
        return $this->repositoryPath() .'/*.php';
    }

    private function className($class) {
        return pathinfo($class, PATHINFO_FILENAME);
    }

    private function getNamespace($className, $interface = false) {

        $namespacePath = "App\Repositories\\";

        if($interface)
            return "{$namespacePath}Interfaces\\{$className}Interface";

        return $namespacePath . $className;
    }
}
