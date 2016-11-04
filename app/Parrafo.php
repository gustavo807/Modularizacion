<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parrafo extends Model
{
    protected $table = 'parrafos';
    public $fillable = ['parrafo','modulo_id'];
}
