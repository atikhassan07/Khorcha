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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incate_id');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('slug')->nullable();
            $table->date('date');
            $table->integer('ammount');
            $table->integer('income_creator')->nullable();
            $table->integer('status')->default(1);
            $table->text('remarks')->nullable();
            $table->foreign('incate_id')->references('id')->on('incomecategories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
