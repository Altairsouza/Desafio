<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];


    public function membro() {


   return $this->belongsTo('App\Models\Membro', 'membro_id','id');
    }
}
