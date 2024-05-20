<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consume_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->bigInteger('payment');
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('water_supplier_bin')->references('bin')->on('water_suppliers')->onDelete('restrict');
            $table->foreign('consume_type_id')->references('id')->on('consume_types')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consume_types');
    }
};
