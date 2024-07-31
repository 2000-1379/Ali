<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->unique();
            $table->string('national_code');
            $table->string('type')->default('hagigi')->change();
            $table->string('mobile');
            $table->string('phone');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('zipcode');
            $table->string('description');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
