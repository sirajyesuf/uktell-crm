<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voice_rate');
            $table->unsignedBigInteger('sms_rate');
            $table->unsignedBigInteger('data_rate');

            $table->string('home_country');
            $table->string('currency');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('generals');
    }
};
