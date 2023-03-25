<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;

class MakeLayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '
        make:layer {name}
        {--e|eloquent : Generate a repository eloquent for the model}
        {--i|interface : Generate a repository interface for the model}
        {--s|service : Generate a service for the model}
        {--r|repository : Generate a repository interface and eloquent for the model}
        {--a|all : Generate a service, repository interface and repository eloquent for the model}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class from layered architecture';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');

        $options = $this->options();
        $availableOptions = collect(['eloquent', 'interface', 'service', 'repository', 'all']);

        if (!$availableOptions->reduce(fn ($value, $op) => $value or $options[$op], false)){
            $this->error('ERROR: Inform which layer will be created');
            return Command::FAILURE;
        }

        if ($options['all']) {
            $this->call('make:repository:interface', ['name' => $name]);
            $this->call('make:repository:eloquent', ['name' => $name]);
            $this->call('make:service', ['name' => $name]);

            return Command::SUCCESS;
        }

        if ($options['repository']) {
            $this->call('make:repository:interface', ['name' => $name]);
            $this->call('make:repository:eloquent', ['name' => $name]);

            return Command::SUCCESS;
        }

        if ($options['interface']) {
            $this->call('make:repository:eloquent', ['name' => $name]);
        }

        if ($options['eloquent']) {
            $this->call('make:repository:interface', ['name' => $name]);
        }

        if ($options['service']) {
            $this->call('make:service', ['name' => $name]);
        }

        return Command::SUCCESS;
    }

}
