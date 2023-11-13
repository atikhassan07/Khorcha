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
        Schema::create('incomecategories', function (Blueprint $table) {
            $table->id();
            $table->string('incate_name', 50)->unique();
            $table->string('remarks',200)->nullable();
            $table->string('slug',200)->nullable();
            $table->integer('incate_creator')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomecategories');
    }
};
