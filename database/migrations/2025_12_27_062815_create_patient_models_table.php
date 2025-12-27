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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id_patient');
            $table->string('photo_path',350)->nullable();
            $table->string('identification', 50)->unique();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->date('birth_date')->nullable();
            $table->enum('gender', ['M', 'F', 'O'])->default('O');
            $table->string('phone', 30)->nullable();
            $table->string('cellphone', 30)->nullable();
            $table->string('email', 150)->nullable();
            $table->integer('insurance' )->default(0);
            $table->string('insurance_number', 100)->nullable();
            $table->text('address')->nullable();
            $table->text('observations')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
