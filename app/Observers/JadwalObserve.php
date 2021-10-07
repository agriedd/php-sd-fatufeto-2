<?php

namespace App\Observers;

use App\Jadwal;

class JadwalObserve{
    public function created(Jadwal $jadwal){
        
    }

    /**
     * Handle the jadwal "updated" event.
     *
     * @param  \App\Jadwal  $jadwal
     * @return void
     */
    public function updated(Jadwal $jadwal)
    {
        //
    }

    /**
     * Handle the jadwal "deleted" event.
     *
     * @param  \App\Jadwal  $jadwal
     * @return void
     */
    public function deleted(Jadwal $jadwal)
    {
        //
    }

    /**
     * Handle the jadwal "restored" event.
     *
     * @param  \App\Jadwal  $jadwal
     * @return void
     */
    public function restored(Jadwal $jadwal)
    {
        //
    }

    /**
     * Handle the jadwal "force deleted" event.
     *
     * @param  \App\Jadwal  $jadwal
     * @return void
     */
    public function forceDeleted(Jadwal $jadwal)
    {
        //
    }
}
