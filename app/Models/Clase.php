<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'nombre',
        'email',
    ];// Aquí puedes definir propiedades y métodos específicos del modelo Maestro
}
