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
        Schema::create('data', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ssn');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedTinyInteger('test1');
            $table->unsignedTinyInteger('test2');
            $table->unsignedTinyInteger('test3');
            $table->unsignedTinyInteger('test4');
            $table->unsignedTinyInteger('final');
            $table->string('grade');
            $table->timestamps();

            $table->primary(['user_id', 'ssn']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
