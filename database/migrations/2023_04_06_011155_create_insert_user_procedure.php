<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('CREATE PROCEDURE InsertUser (
            IN p_name VARCHAR(255),
            IN p_email VARCHAR(255),
            IN p_telp VARCHAR(255),
            IN p_password VARCHAR(255),
            IN p_level VARCHAR(255)
        )
        BEGIN
            INSERT INTO 15516_users (`name`, `email`, `telp`, `password`, `level`) 
            VALUES (p_name, p_email, p_telp, p_password, p_level);
        END');

        // $name = "John Doe";
        // $email = "johndoe@example.com";
        // $telp = "081239923212";
        // $password = Hash::make('123qweasd');
        // $level = 'public';

        // DB::select('CALL InsertUser(?, ?, ?, ?, ?)', array($name, $email, $telp, $password, $level));
        // Schema::create('insert_user_procedure', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS InsertUser');
        // Schema::dropIfExists('insert_user_procedure');
    }
};
