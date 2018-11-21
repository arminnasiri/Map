<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Point extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable=['type','lat','lng'];
}
