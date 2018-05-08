<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linha extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
}
