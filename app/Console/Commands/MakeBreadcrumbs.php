<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeBreadcrumbs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:breadcrumbs {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate breadcrumbs for a specific route';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Retrieve the name argument
        $name = $this->argument('name');
        
        // Your logic to generate breadcrumbs here
        // You can use the Breadcrumbs::for() method from the package

        $this->info("Breadcrumbs \"$name\" created successfully.");
        
        return 0;
    }
}
