<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class MyCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:script {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'run a script';

     /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/script.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Script';
    }

}
