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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('owner_id');
            $table->unsignedBigInteger('category_id');
            $table->string('name', 50);
            $table->integer('price');
            $table->string('image', 255);
            $table->text('description');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
