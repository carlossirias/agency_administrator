<?php

namespace App\Observers;

use App\Models\Agency;
use App\Models\Pallete;
use App\Models\PricePallete;
use Illuminate\Support\Facades\Auth;

class PalleteObserver
{
    /**
     * Handle the Pallete "created" event.
     */
    public function created(Pallete $pallete): void
    {
        //
        $agencies = Agency::all();

        foreach($agencies as $agency)
        {
            PricePallete::Create([
                'agency_id'=> $agency->id,
                'pallete_id' => $pallete->id,
                'added_price' => env('ADDED_PRICE'),
            ]);
        }
    }

    /**
     * Handle the Pallete "updated" event.
     */
    public function updated(Pallete $pallete): void
    {
        //
    }

    /**
     * Handle the Pallete "deleted" event.
     */
    public function deleted(Pallete $pallete): void
    {
        //
    }

    /**
     * Handle the Pallete "restored" event.
     */
    public function restored(Pallete $pallete): void
    {
        //
    }

    /**
     * Handle the Pallete "force deleted" event.
     */
    public function forceDeleted(Pallete $pallete): void
    {
        //
    }
}
