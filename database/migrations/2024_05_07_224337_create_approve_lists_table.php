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
        Schema::create('approve_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('id')->on('request_lists')->onDelete('cascade');
            $table->unsignedBigInteger('first_name');
            $table->foreign('first_name')->references('id')->on('users');
            $table->unsignedBigInteger('last_name');
            $table->foreign('last_name')->references('id')->on('users');
            $table->unsignedBigInteger('idnum');
            $table->foreign('idnum')->references('id')->on('users');
            $table->unsignedBigInteger('affiliation');
            $table->foreign('affiliation')->references('id')->on('users');
            // Add other columns as needed
            $table->timestamps();
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approve_lists');
    }
};
