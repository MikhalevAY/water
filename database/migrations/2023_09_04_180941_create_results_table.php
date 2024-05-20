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
            $table->float('last_consumption')->nullable();
            $table->float('total_consumption');
            $table->string('counter_serial', 80)->nullable();

            $table->float('cost_services_begin')->nullable();
            $table->float('cost_subsidies_begin')->nullable();
            $table->float('total_consumption_norm')->nullable();
            $table->float('total_consumption_col')->nullable();
            $table->float('total_consumption_epuv')->nullable();
            $table->float('total_consumption_bz')->nullable();
            $table->float('total_consumption_cs')->nullable();
            $table->float('cost_services_begin_norm')->nullable();
            $table->float('cost_services_begin_col')->nullable();
            $table->float('cost_services_begin_epuv')->nullable();
            $table->float('cost_services_begin_bz')->nullable();
            $table->float('cost_services_begin_cs')->nullable();
            $table->float('cost_subsidies_begin_norm')->nullable();
            $table->float('cost_subsidies_begin_col')->nullable();
            $table->float('cost_subsidies_begin_epuv')->nullable();
            $table->float('cost_subsidies_begin_bz')->nullable();
            $table->float('cost_subsidies_begin_cs')->nullable();
            $table->float('cost_subsidies_begin_all')->nullable();
            $table->float('cost_services_begin_all')->nullable();
            $table->float('total_consumption_all')->nullable();

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
