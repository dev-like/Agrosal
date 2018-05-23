<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Linha;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome',
    'descricao',
    'linha_id',
    'indicacoes',
    'mododeusar',
    'imagem',
    'calcio',
    'fosforo',
    'enxofre',
    'magnesio',
    'zinco',
    'cobre',
    'cobalto',
    'iodo',
    'selenio',
    'manganes',
    'slug'
  ];

    public function linha()
    {
        return $this->belongsTo('App\Models\Linha');
    }

    use SoftDeletes;
}
