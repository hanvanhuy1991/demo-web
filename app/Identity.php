<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $fillable =[
      'id', 'number', 'date', 'address', 'image_before', 'image_after'
    ];
}
