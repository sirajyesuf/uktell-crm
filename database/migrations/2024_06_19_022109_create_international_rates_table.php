<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('international_rates', function (Blueprint $table) {
            $table->id();
            $table->string("country_code");
            $table->string("country_name");
            $table->integer('rate');
            $table->string('type');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('international_rates');
    }
};
