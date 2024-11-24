<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cupcake', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->unsignedInteger('preco');
            $table->string('imagem_url');
            $table->unsignedInteger('estoque');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cupcake');
    }
};
