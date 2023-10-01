<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meter_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_account')->index();
            $table->float('indication')->nullable();
            $table->integer('month');
            $table->integer('year');
            $table->unsignedBigInteger('staff_iin')->nullable();
            $table->float('consumed_volume');
            $table->string('counter_serial', 80)->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        Schema::table('meter_data', function (Blueprint $table) {
            $table->foreign('customer_account')->references('account')->on('customers')->onDelete('restrict');
            $table->foreign('counter_serial')->references('serial')->on('counters')->onDelete('restrict');
            $table->foreign('staff_iin')->references('iin')->on('staff')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meter_data');
    }
};
