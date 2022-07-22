<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ZipCode
 * @package App\Models
 * @version July 22, 2022, 12:02 pm UTC
 *
 * @property string $d_codigo
 * @property string $d_asenta
 * @property string $d_tipo_asenta
 * @property string $D_mnpio
 * @property string $d_estado
 * @property string $d_ciudad
 * @property string $d_CP
 * @property string $c_estado
 * @property string $c_oficina
 * @property string $c_CP
 * @property string $c_tipo_asenta
 * @property string $c_mnpio
 * @property string $id_asenta_cpcons
 * @property string $d_zona
 * @property string $c_cve_ciudad
 */
class ZipCode extends Model
{

    use HasFactory;

    public $table = 'zip_codes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'd_codigo',
        'd_asenta',
        'd_tipo_asenta',
        'D_mnpio',
        'd_estado',
        'd_ciudad',
        'd_CP',
        'c_estado',
        'c_oficina',
        'c_CP',
        'c_tipo_asenta',
        'c_mnpio',
        'id_asenta_cpcons',
        'd_zona',
        'c_cve_ciudad'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'd_codigo' => 'string',
        'd_asenta' => 'string',
        'd_tipo_asenta' => 'string',
        'D_mnpio' => 'string',
        'd_estado' => 'string',
        'd_ciudad' => 'string',
        'd_CP' => 'string',
        'c_estado' => 'string',
        'c_oficina' => 'string',
        'c_CP' => 'string',
        'c_tipo_asenta' => 'string',
        'c_mnpio' => 'string',
        'id_asenta_cpcons' => 'string',
        'd_zona' => 'string',
        'c_cve_ciudad' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'd_codigo' => 'nullable|string|max:255',
        'd_asenta' => 'nullable|string|max:255',
        'd_tipo_asenta' => 'nullable|string|max:255',
        'D_mnpio' => 'nullable|string|max:255',
        'd_estado' => 'nullable|string|max:255',
        'd_ciudad' => 'nullable|string|max:255',
        'd_CP' => 'nullable|string|max:255',
        'c_estado' => 'nullable|string|max:255',
        'c_oficina' => 'nullable|string|max:255',
        'c_CP' => 'nullable|string|max:255',
        'c_tipo_asenta' => 'nullable|string|max:255',
        'c_mnpio' => 'nullable|string|max:255',
        'id_asenta_cpcons' => 'nullable|string|max:255',
        'd_zona' => 'nullable|string|max:255',
        'c_cve_ciudad' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
