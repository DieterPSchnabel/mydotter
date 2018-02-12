<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Countries
 * @package App\Models
 * @version December 14, 2017, 3:09 pm CET
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string countries_name
 * @property string countries_iso_code_2
 * @property string countries_iso_code_3
 * @property integer address_format_id
 * @property integer active
 * @property integer sort_order
 * @property integer is_europe
 * @property integer indiv_porto_active
 * @property float indiv_porto
 * @property integer indiv_porto_freigrenze
 */
class Countries extends Model
{

    public $table = 'countries';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'countries_name',
        'countries_iso_code_2',
        'countries_iso_code_3',
        'address_format_id',
        'active',
        'sort_order',
        'is_europe',
        'indiv_porto_active',
        'indiv_porto',
        'indiv_porto_freigrenze'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'countries_name' => 'string',
        'countries_iso_code_2' => 'string',
        'countries_iso_code_3' => 'string',
        'address_format_id' => 'integer',
        'active' => 'integer',
        'sort_order' => 'integer',
        'is_europe' => 'integer',
        'indiv_porto_active' => 'integer',
        'indiv_porto' => 'float',
        'indiv_porto_freigrenze' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
