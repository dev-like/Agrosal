<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Noticia extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'noticias';
    protected $fillable = ['titulo','descricao','conteudo', 'datapublicacao','slug'];
    protected $dates = ['deleted_at'];
}
