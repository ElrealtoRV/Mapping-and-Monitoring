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
        Schema::create('expired_fires', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('firename');
            $table->string('serial_number');
            $table->string('building');
            $table->string('floor');
            $table->string('room');
            $table->date('installation_date');
            $table->date('expiration_date')->default(now());
            $table->text('description')->nullable();
            $table->string('status')->default('Expired');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expired_fires');
    }
};
