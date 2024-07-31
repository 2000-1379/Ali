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
        Schema::create('factoritems', function (Blueprint $table) {
            $table->id();
            $table->integer('factor_id');
            $table->string('image')->default('https://images.app.goo.gl/p675qGcJiLaJSzZb7');
            $table->string('title')->default('Untitled');
            $table->string('price')->default(0);
            $table->string('total')->default(0);
            $table->string('discount')->default(0);
            $table->string('status')->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factoritems');
    }
};
