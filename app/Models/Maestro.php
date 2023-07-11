<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $guarded = []; // Permitir asignación masiva de todos los atributos

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string',
            'email' => 'required|email|unique:maestros',
            // Otras reglas de validación que necesites
        ];
    }  // Aquí puedes definir propiedades y métodos específicos del modelo Maestro
}
