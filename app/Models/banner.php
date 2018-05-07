<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class banners extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    public function noticia()
    {
        return $this->belongsTo('App\Models\Noticia');
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\Produto');
    }

    public function linha()
    {
        return $this->belongsTo('App\Models\Linha');
    }
}
