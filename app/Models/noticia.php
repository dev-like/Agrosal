<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
}
