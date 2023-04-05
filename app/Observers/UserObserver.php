<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserLog;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level ? 'public' : 'public',
            'desc' =>  'User berhasil ditambahkan'
        ]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'desc' =>  'User berhasil diupdate'
        ]);
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        UserLog::create([
            'name' => $user->name,
            'email' => $user->email,
            'level' => $user->level,
            'desc' =>  'User berhasil didelete'
        ]);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
