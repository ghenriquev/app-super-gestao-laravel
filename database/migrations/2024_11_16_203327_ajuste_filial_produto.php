<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        // Criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('nome_filial', 30);
            $table->timestamps();
        });

        // Criando a tabela filial_produto
        Schema::create('filial_produto', function (Blueprint $table) {
            // Colunas
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            // Constraints (FKs)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        // Deletando as colunas preco_venda, estoque_minimo e estoque_maximo da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_minimo', 'estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        // Adicionando as colunas preco_venda, estoque_minimo e estoque_maximo da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->float('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        // Removendo a tabela filial_produto
        Schema::dropIfExists('filial_produto');
        // Nesse caso, as constraints foram criadas dentro do método Schema::create, então não é necessário dropar as FKs separadamente.

        Schema::dropIfExists('filiais');
    }
};
