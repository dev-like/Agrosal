<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
}
