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
        Schema::create('group_data_inserts', function (Blueprint $table) {
            $table->id();
            $table->string('admin')->unique();
            $table->string('category');
            $table->string('name')->unique();
            $table->longText('description');
            $table->string('image');
            $table->rememberToken();
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_data_inserts');
    }
};
