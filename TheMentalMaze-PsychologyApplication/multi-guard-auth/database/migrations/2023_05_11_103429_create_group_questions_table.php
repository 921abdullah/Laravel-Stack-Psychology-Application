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
        Schema::create('group_questions', function (Blueprint $table) {
            $table->id();
            $table->string('group_member');
            $table->string('group_name');
            $table->foreign('group_member')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('group_name')->references('name')->on('group_data_inserts')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('question');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_questions');
    }
};
