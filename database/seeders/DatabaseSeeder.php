<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
                'name' => 'Admin',
                'telp' => '089985487121',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'admin'
        ]);

        User::create([
                'name' => 'Staff 1',
                'telp' => '089985487122',
                'email' => 'staff1@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'staff'
        ]);
        User::create([
                'name' => 'Staff 2',
                'telp' => '089985487123',
                'email' => 'staff2@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'staff'
        ]);

        User::create([
                'name' => 'Public 1',
                'telp' => '089985487124',
                'email' => 'public1@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'public'
        ]);
        User::create([
                'name' => 'Public 2',
                'telp' => '089985487125',
                'email' => 'public2@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'public'
        ]);
        User::create([
                'name' => 'Public 3',
                'telp' => '089985487126',
                'email' => 'public3@gmail.com',
                'password' => Hash::make('123qweasd'),
                'level' => 'public'
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
