<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 200);
            $table->string('name', 200);
            $table->string('patronymic', 200);
            $table->bigInteger('iin')->nullable()->index();
            $table->bigInteger('water_supplier_bin')->nullable();
            $table->integer('status_code');
            $table->string('password')->nullable();
            $table->timestamp('last_auth')->nullable();
            $table->timestamps();
        });

        Schema::table('staff', function (Blueprint $table) {
            $table->foreign('water_supplier_bin')->references('bin')->on('water_suppliers')->onDelete('restrict');
            $table->foreign('status_code')->references('code')->on('staff_statuses')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
