<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('roamings', function (Blueprint $table) {
            $table->id();
            $table->string("country_code");
            $table->string("country_name");
            $table->unsignedBigInteger('incoming_rate')->nullable();
            $table->unsignedBigInteger('outgoingtolocal_rate')->nullable();
            $table->unsignedBigInteger('outgoingtohomecountry_rate')->nullable();
            $table->unsignedBigInteger('outgoingtorestoftheworld_rate')->nullable();
            $table->unsignedBigInteger('data_rate')->nullable();
            $table->string('type');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('roamings');
    }
};
