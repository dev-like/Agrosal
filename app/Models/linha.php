<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Linha extends Model
{
    use SoftDeletes,CascadeSoftDeletes ;

    protected $table = 'linhas';
    protected $fillable = ['nome','descricao','slug'];
    protected $dates = ['deleted_at'];

    public function produto()
    {
        return $this->hasMany('App\Models\Produto');
    }
}
