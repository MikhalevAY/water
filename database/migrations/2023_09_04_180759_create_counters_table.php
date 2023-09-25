<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->string('serial', 80)->index()->unique();
            $table->bigInteger('customer_account')->index();
            $table->timestamp('checked_at')->nullable();
            $table->timestamps();
        });

        Schema::table('counters', function (Blueprint $table) {
            $table->foreign('customer_account')->references('account')->on('customers')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
