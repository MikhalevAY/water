<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('water_suppliers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bin')->unique()->index();
            $table->string('name', 300);
            $table->string('contract_number', 200);
            $table->timestamp('enclosed_at');
            $table->integer('validity_period');
            $table->integer('tariff_id');
            $table->string('order_number', 200);
            $table->timestamp('order_created_at');
            $table->timestamp('order_started_at');
            $table->json('water_sources');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_suppliers');
    }
};
