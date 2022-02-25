<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enderecos extends Migration
{

    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('membro_id')->constrained('membros')->unsigned();
            $table->string('endereco', 50);
            $table->string('logradouro', 50);
            $table->string('complemento', 50);
            $table->string('cep', 50);
            $table->string('numero', 50);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('estado', 50);
            $table->timestamps();
        });
    }




    public function down()
    {
       Schema::dropIfExists('enderecos');
    }

}
