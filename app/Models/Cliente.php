<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use App\Models\Telefone;
use App\Models\Email;

class Cliente extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $table = 'cliente';
    protected $cascadeDeletes = ['telefone','email'];
    protected $fillable = ['id','razaosocial', 'nomefantasia', 'cpfcnpj', 'cep', 'logradouro',
    'bairro', 'cidade', 'uf', 'complemento', 'numero', 'obs', 'rep_nome','rep_cpf'];
    protected $dates = ['deleted_at'];

        public function telefone()
        {
            return $this->hasMany('App\Models\Telefone');
        }
        public function primeirotelefone()
        {
            return $this->hasOne('App\Models\Telefone')->latest();
        }
        public function email()
        {
            return $this->hasMany('App\Models\Email');
        }
        public function primeiroemail()
        {
            return $this->hasOne('App\Models\Email')->latest();
        }
}
