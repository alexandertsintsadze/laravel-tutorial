<?php

namespace App\Console\Commands;

use App\Http\Services\ProductService;
use Illuminate\Console\Command;

class FetchProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-products {server}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch products from accounting software database';

    /**
     * Execute the console command.
     */
    public function handle(ProductService $productService)
    {
        //
        $this->info('fetch started from server: ' . $this->argument('server'));

        if (!$productService->fetchProductsFromMainDatabase()) {
            $this->error('failed');
            return 0;
        }

        $this->info('fetch finished');

        // $this->error('failed');
    }
}
