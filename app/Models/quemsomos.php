<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quemsomos extends Model
{
    protected $table = 'quemsomos';
    protected $fillable = ['id','razaosocial', 'nomefantasia', 'cnpj', 'ie', 'tradicao',
    'tecnologia', 'inovacao', 'quemsomos', 'email', 'telefone', 'fax', 'sac','endereco','bairro',
    'cidade','estado','cep','facebook','instagram','youtube'];

    use SoftDeletes;
}
