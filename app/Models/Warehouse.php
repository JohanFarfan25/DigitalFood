<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Para soporte de eliminación suave

class Warehouse extends Model
{
    use SoftDeletes; // Habilita la eliminación suave

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses'; // Nombre de la tabla en la base de datos

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'max_capacity',
        'temperature_controlled',
        'status',
        'registered_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'temperature_controlled' => 'boolean', // Asegura que sea tratado como booleano
        'status' => 'string', // Asegura que 'status' sea tratado como cadena
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Obtener el usuario que registró el almacén.
     */
    public function registeredBy()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}
