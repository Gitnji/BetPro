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
        Schema::create("bets", function (Blueprint $table) {
         $table->id();
         $table->string('bet_date');
         $table->string('sport');
         $table->string('confidence');
         $table->string('event');
         $table->string('bet_type');
         $table->string('odds');
         $table->enum('plan',['free','2 to 3 odds','investment']);
         $table->string('event_time');
         $table->string('analysis');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bets');
    }
};
