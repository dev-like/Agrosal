<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Linha extends Model
{
    protected $table = 'linhas';
    protected $fillable = ['nome','descricao','slug'];

    public function produto()
    {
        return $this->hasMany('App\Models\Produto');
    }

    use SoftDeletes;
}
