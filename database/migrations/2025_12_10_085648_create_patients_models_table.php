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
            $table->string('name', 150);
            $table->date('born_date' );
            $table->string('sex', 100);
            $table->string('address', 600);
            $table->integer('id_insurance');
            $table->string('type_identification', 100);
            $table->string('identification', 100);
            $table->string('telephone', 100);
            $table->string('cellphone', 100);
            $table->string('email',250)->unique();
            $table->integer('state');
            $table->softDeletes('deleted_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_models');
    }
};
