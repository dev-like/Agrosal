<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Model
{
    protected $table = 'noticias';
    protected $fillable = ['titulo','descricao','conteudo', 'datapublicacao','slug'];

    use SoftDeletes;
}
