<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Log de arreglos ingresados y Rotados (input y output)
class Arreglo extends Model
{
    protected $table = 'arreglos';

    protected $fillable = ['input', 'output'];
}
