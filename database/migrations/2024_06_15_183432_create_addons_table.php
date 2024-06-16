<?php

use App\Enums\BundleCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->text('stripe_price_id');
            $table->text('short_description');
            $table->text('popupbox_description');
            $table->enum('category',BundleCategory::toArray());

            $table->timestamps();
            $table->softDeletes();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
