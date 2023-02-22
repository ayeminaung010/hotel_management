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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->json('room_type_id');
            $table->json('room_id');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->bigInteger('phone_no');
            $table->string('email');
            $table->foreignId('card_type_id')->constrained('i_d_card_types');
            $table->string('card_number')->nullable();
            $table->string('residential_address');
            $table->integer('number_of_guest');
            $table->integer('number_of_child')->nullable();
            $table->bigInteger('total_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
