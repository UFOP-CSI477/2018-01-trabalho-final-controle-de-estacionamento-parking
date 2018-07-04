<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVeiculo extends Model
{
    protected $fillable = [ 'tipo', 'valor_por_hora'];
}
