<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [ 'placa', 'tipo_veiculo_id', 'modelo', 'cor', 'ano', 'user_id', 'vaga_id' ];
}
