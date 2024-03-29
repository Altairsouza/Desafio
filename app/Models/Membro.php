<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{

    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

   public function telefones()
   {
            return $this->hasMany(Telefone::class);
   }

   public function enderecos()
   {
       return $this->hasMany(Endereco::class);
   }
}
