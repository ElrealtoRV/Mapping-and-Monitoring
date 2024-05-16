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
        Schema::create('record_lists', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('firename');
            $table->string('serial_number');
            $table->string('building');
            $table->string('floor');
            $table->string('room');
            $table->date('maintenance_date');
            $table->date('expiration_date')->default(now());
            $table->unsignedBigInteger('finding'); // Changing the data type
            $table->foreign('finding')->references('id')->on('finding_lists')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_lists');
    }
};
