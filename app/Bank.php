<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'id', 'name', 'bank_number', 'master_name', 'brands_name'
    ];
}
