<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelHasRole extends Pivot
{
    use HasFactory;

    // Establecemos el nombre de la tabla
    protected $table = 'model_has_roles';

    // Definimos las columnas que pueden ser asignadas en masa
    protected $fillable = ['model_id', 'role_id', 'team_id', 'model_type'];

    // Desactivamos el manejo automático de timestamps si no los necesitas
    public $timestamps = false;

}
