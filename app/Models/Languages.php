<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Languages
 * @package App\Models
 * @version December 14, 2017, 2:56 pm CET
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string code
 * @property string lara_code
 * @property string image
 * @property string directory
 * @property integer sort_order
 * @property boolean status
 * @property boolean rtl
 * @property string fallback_frontend
 * @property string fallback_backend
 */
class Languages extends Model
{

    public $table = 'languages';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'code',
        'lara_code',
        'image',
        'directory',
        'sort_order',
        'status',
        'status_frontend',
        'rtl',
        'fallback_frontend',
        'fallback_backend'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'code' => 'string',
        'lara_code' => 'string',
        'image' => 'string',
        'directory' => 'string',
        'sort_order' => 'integer',
        'status' => 'boolean',
        'status_frontend' => 'boolean',
        'rtl' => 'boolean',
        'fallback_frontend' => 'string',
        'fallback_backend' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
