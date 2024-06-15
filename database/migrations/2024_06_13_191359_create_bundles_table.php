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
            $table->text('name');
            $table->string('reference')->unique();
            $table->enum('category',BundleCategory::toArray());
            $table->integer('data_allowance');
            $table->integer('intl_voice_allowance');
            $table->unsignedBigInteger('sell_price');
            $table->unsignedBigInteger('buy_price');
            $table->json('features');
            $table->integer('validity');
            $table->string('stripe_price_id');
            $table->string('intl_voice_aoid');
            $table->string('data_aoid');
            $table->string('sms_aoid');
            $table->string('voice_aoid');
            $table->string('throttled_data_aoid');
            $table->timestamps();
            $table->softDeletes();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('bundles');
    }
};
