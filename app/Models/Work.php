<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Work extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'name', 'desc', 'belong_project'
    ];

}
