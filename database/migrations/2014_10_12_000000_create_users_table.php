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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->integer('age'); // Corrected data type
            $table->string('bdate');
            $table->string('email')->unique();
            $table->bigInteger('contnum')->unique();
            $table->bigInteger('idnum')->unique();
            $table->string('office');
            $table->string('college')->nullable();
            $table->string('password');
            $table->integer('status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('first_name_verified_at')->nullable();
            $table->timestamp('last_name_verified_at')->nullable();
            $table->rememberToken();
            $table->string('role')->nullable(); // Adding the role column
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
