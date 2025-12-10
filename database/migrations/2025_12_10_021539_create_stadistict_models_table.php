<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Query\Expression;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stadisticts', function (Blueprint $table) {
            $table->id('id_stadistic');
            $table->integer('type');
            $table->string('name',250);
            $table->integer('id_document_header');
            $table->integer('total_patients');
            $table->integer('total_insurances');
            $table->json('values')->default(new Expression('(JSON_ARRAY())'));
            $table->date('date_resume');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadisticts');
    }
};
