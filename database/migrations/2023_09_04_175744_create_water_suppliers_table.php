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
            $table->unsignedBigInteger('bin')->index();
            $table->string('name', 300);
            $table->string('contract_number', 200)->nullable();
            $table->timestamp('enclosed_at')->nullable();
            $table->integer('validity_period')->nullable();
            $table->string('order_number', 200)->nullable();
            $table->timestamp('order_created_at')->nullable();
            $table->timestamp('order_started_at')->nullable();
            $table->json('water_sources')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('water_suppliers');
    }
};
