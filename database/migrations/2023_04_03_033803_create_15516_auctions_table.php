<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('15516_auctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('15516_items')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('15516_users')->nullOnDelete();
            $table->foreignId('staff_id')->constrained('15516_users')->cascadeOnDelete();
            $table->enum('status',['open','close'])->default('open');
            $table->bigInteger('final_price')->nullable();
            $table->timestamp('open');
            $table->timestamp('close')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('15516_auctions');
    }
};
