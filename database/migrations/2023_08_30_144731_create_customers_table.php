<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account')->index();
            $table->string('last_name', 200);
            $table->string('name', 200);
            $table->string('patronymic', 200)->nullable();
            $table->bigInteger('iin');
            $table->integer('registration_city_id')->nullable();
            $table->string('registration_address', 500)->nullable();
            $table->integer('residence_city_id')->nullable();
            $table->string('residence_address', 500)->nullable();
            $table->integer('amount_of_people');
            $table->timestamp('connected_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
