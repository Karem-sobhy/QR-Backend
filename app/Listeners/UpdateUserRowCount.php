<?php

namespace App\Listeners;

use App\Events\Upserted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserRowCount
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
    public function handle(Upserted $event): void
    {
        $user = $event->user;
        $user->row_count = $user->data()->count();
        $user->save();
    }
}
