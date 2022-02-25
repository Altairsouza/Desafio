<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Telefones extends Migration
{

    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->id();
            $table->string('telefone', 11);
            $table->foreignId('membro_id')->constrained('membros')->unsigned();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
