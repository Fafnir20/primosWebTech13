<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('amizades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario1_id');
            $table->unsignedBigInteger('usuario2_id');
            $table->enum('status', ['pendente', 'aceito', 'recusado'])->default('pendente');
            $table->timestamps();

            $table->foreign('usuario1_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('usuario2_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amizades');
    }
};
