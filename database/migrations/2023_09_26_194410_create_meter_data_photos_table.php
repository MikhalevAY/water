<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meter_data_photos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meter_data_id')->index();
            $table->string('path');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meter_data_photos');
    }
};
