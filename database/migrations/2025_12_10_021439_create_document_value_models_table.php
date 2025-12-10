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
        Schema::create('document_values', function (Blueprint $table) {
            $table->id('id_document_value');
            $table->integer('id_document_body');
            $table->json('values')->default(new Expression('(JSON_ARRAY())'));
            $table->integer('order');
            $table->softDeletes('deleted_at' );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_values');
    }
};
