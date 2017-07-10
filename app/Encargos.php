<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargos extends Model
{
    protected $fillable = ['albaran', 'destinatario','direccion', 'poblacion', 'cp','provincia', 'telefono', 'observaciones','fecha'];
}
