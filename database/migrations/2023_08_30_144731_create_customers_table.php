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
            $table->bigInteger('account')->index()->unique();
            $table->string('last_name', 200);
            $table->string('name', 200);
            $table->string('patronymic', 200)->nullable();
            $table->string('iin');
            $table->string('water_supplier_bin');
            $table->integer('registration_city_code')->nullable();
            $table->string('registration_address', 500)->nullable();
            $table->integer('residence_city_code')->nullable();
            $table->string('residence_address', 500)->nullable();
            $table->integer('amount_of_people');
            $table->timestamp('connected_at');
            $table->double('water_limit')->nullable();
            $table->integer('customer_status')->nullable();
            $table->unsignedBigInteger('consume_type_id');

            $table->string('registration_address_house')->nullable();
            $table->string('residence_address_house')->nullable();
            $table->string('residence_address_appartment')->nullable();
            $table->string('registration_address_appartment')->nullable();
            $table->string('notation')->nullable();
            $table->integer('second_counter')->nullable();
            $table->integer('cid')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
