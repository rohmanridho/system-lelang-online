<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('CREATE TRIGGER update_telp AFTER UPDATE ON 15516_users
        FOR EACH ROW 
        BEGIN
            DECLARE descript VARCHAR(255); 
            SET descript = CONCAT(NEW.name, " mengganti nomornya");
            IF NEW.telp != OLD.telp THEN
                INSERT into telp_logs (`desc`) VALUES (descript);
            END IF;
        END');
        // Schema::table('15516_users', function (Blueprint $table) {
        //     //
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS update_telp');
        // Schema::table('15516_users', function (Blueprint $table) {
        //     //
        // });
    }
};
