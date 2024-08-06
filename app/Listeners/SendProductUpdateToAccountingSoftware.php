<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\Events\ProductUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductUpdateToAccountingSoftware
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductCreated|ProductUpdated $event): void
    {
        //
    }
}
