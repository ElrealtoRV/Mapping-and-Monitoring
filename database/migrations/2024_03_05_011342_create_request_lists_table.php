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
        Schema::create('request_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('type_lists')->nullable();
            $table->string('firename')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('room');
            $table->string('building')->nullable();
            $table->string('floor')->nullable();
            $table->unsignedBigInteger('request');
            $table->foreign('request')->references('id')->on('requests');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_lists');
    }
};
