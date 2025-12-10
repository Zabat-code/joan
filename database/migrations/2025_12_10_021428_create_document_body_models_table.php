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
        Schema::create('document_bodys', function (Blueprint $table) {
            $table->id('id_document_body');
            $table->string('label',250);
            $table->string('code',250);
            $table->string('format',250);
            $table->integer('id_document_header');
            $table->integer('order');
            $table->integer('format_type');
            $table->integer('type');
            $table->boolean('required')->default(false);
            $table->timestamps();
            $table->softDeletes('deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_bodys');
    }
};
