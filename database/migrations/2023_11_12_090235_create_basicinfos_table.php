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
        Schema::create('basicinfos', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_title')->nullable();
            $table->string('main_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->integer('status')->default(1);
            $table->integer('editor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basicinfos');
    }
};
