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
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->string('validity')->nullable();
            $table->unsignedBigInteger('sell_price')->nullable();
            $table->unsignedBigInteger('buy_price')->nullable();
            $table->unsignedBigInteger('data_allowance')->nullable();
            $table->unsignedBigInteger('voice_allowance')->nullable();
            $table->unsignedBigInteger('sms_allowance');
            
            $table->string('region')->nullable();
            $table->json('locations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
