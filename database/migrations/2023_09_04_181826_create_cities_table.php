<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->string('name', 80);
            $table->string('code', 12)->nullable()->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
