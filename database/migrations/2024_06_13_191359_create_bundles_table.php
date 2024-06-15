<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\BundleCategory;
return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('reference')->unique();
            $table->enum('category',BundleCategory::toArray())->nullable();
            $table->integer('data_allowance')->nullable();
            $table->integer('intl_voice_allowance')->nullable();
            $table->unsignedBigInteger('sell_price')->nullable();
            $table->unsignedBigInteger('buy_price')->nullable();
            $table->json('features')->nullable();
            $table->string('validity')->nullable();
            $table->string('stripe_price_id')->nullable();
            $table->string('intl_voice_aoid')->nullable();
            $table->string('data_aoid')->nullable();
            $table->string('sms_aoid')->nullable();
            $table->string('voice_aoid')->nullable();
            $table->string('throttled_data_aoid')->nullable();

            #########
            $table->string('label')->nullable();
            $table->integer('voice_allowance')->nullable();
            $table->integer('sms_allowance')->nullable();

            


            #timestamps
            $table->timestamps();
            $table->softDeletes();
        });
    }    

  
    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};
