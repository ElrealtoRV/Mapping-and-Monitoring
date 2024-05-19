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
        Schema::create('fire_list_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fire_list_id');
            $table->string('type');
            $table->string('firename');
            $table->string('serial_number');
            $table->string('building');
            $table->string('floor')->nullable();
            $table->string('room');
            $table->date('installation_date');
            $table->date('expiration_date');
            $table->text('description')->nullable();
            $table->string('finding')->nullable();
            $table->string('status');
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('fire_list_id')->references('id')->on('fire_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fire_list_histories');
    }
};
