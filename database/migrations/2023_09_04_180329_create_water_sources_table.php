<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('water_sources', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('water_source_id')->index();
            $table->string('name', 80);
            $table->string('location', 80);
            $table->string('ipvu', 80);
            $table->json('water_suppliers');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_sources');
    }
};
