<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdicionaForeingProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria')->after('nome'); 
            $table->unsignedBigInteger('unidade_venda')->after('categoria'); 

            $table->foreign('categoria')->references('id')->on('categorias');
            $table->foreign('unidade_venda')->references('id')->on('unidades');

        });
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
