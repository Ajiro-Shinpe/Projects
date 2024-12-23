<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('App_Id');
            $table->string('name');
            $table->string('email');
            $table->string('phoneNo');
            $table->date('AppDate');
            $table->string('AppTime');
            $table->string('stylist')->nullable();
            $table->text('service'); // Use text to store comma-separated values
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
