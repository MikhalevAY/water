<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_account')->index();
            $table->integer('month');
            $table->integer('year');
            $table->float('last_indication')->nullable();
            $table->float('total_consumption');
            $table->string('counter_serial', 80)->nullable();
            $table->timestamps();
        });

        Schema::table('results', function (Blueprint $table) {
            $table->foreign('customer_account', 'results_customer_account')->references('account')->on('customers')->onDelete('restrict');
            $table->foreign('counter_serial')->references('serial')->on('counters')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
