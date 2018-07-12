<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use App\Models\Produto;

class informacaonutricional extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'informacoesnutricionais';
    protected $fillable = ['elemento',
    'valores',
    'produtos_id',
  ];
    protected $dates = ['deleted_at'];


    public function linha()
    {
        return $this->belongsTo('App\Models\Produto');
    }
}
