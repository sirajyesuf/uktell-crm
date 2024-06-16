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
            $table->unsignedBigInteger('data_allowance');
            $table->text('short_description');
            $table->text('popupbox_description');
            $table->text('stripe_price_id');
            $table->unsignedBigInteger('price');



            


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
