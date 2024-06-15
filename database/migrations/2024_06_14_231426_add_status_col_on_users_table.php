<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
   
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('status')->default(User::STATUS_ACTIVE);
        });
    }

  
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('status');
        });
    }
};
