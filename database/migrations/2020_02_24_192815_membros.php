<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Membros extends Migration
{

    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('cpf', 9);
            $table->string('dataNascimento', 8);

            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::drop('membros');
    }
}
