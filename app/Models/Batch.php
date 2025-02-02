<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Para soporte de eliminación suave

class Batch extends Model
{
    use SoftDeletes; // Habilita la eliminación suave

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'batches'; // Nombre de la tabla en la base de datos

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'production_date',
        'expiration_date',
        'total_quantity',
        'location',
        'status',
        'registered_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'production_date' => 'date', // Asegura que sea tratado como fecha
        'expiration_date' => 'date', // Asegura que sea tratado como fecha
        'total_quantity' => 'integer', // Asegura que sea tratado como entero
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
        'production_date',
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Obtener el producto asociado al lote.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * Obtener el usuario que registró el lote.
     */
    public function registeredBy()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}