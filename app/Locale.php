<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = [
        'country', 'language', 'languageName', 'code_2', 'code_3'
    ];
}
