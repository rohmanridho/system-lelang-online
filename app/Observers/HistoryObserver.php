<?php

namespace App\Observers;

use App\Models\History;
use App\Models\HistoryLog;

class HistoryObserver
{
    /**
     * Handle the History "created" event.
     */
    public function created(History $history): void
    {
        HistoryLog::create([
            'user' => $history->user->name,
            'item' => $history->items->name,
            'bid' => $history->bid,
            'desc' => 'User berhasil menawar'
        ]);
    }

    /**
     * Handle the History "updated" event.
     */
    public function updated(History $history): void
    {
        //
    }

    /**
     * Handle the History "deleted" event.
     */
    public function deleted(History $history): void
    {
        //
    }

    /**
     * Handle the History "restored" event.
     */
    public function restored(History $history): void
    {
        //
    }

    /**
     * Handle the History "force deleted" event.
     */
    public function forceDeleted(History $history): void
    {
        //
    }
}
