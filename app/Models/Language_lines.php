<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Language_lines
 * @package App\Models
 * @version February 1, 2018, 10:29 pm CET
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string full_key
 * @property string group
 * @property string key
 * @property string source_file
 * @property string de
 * @property string en
 * @property string ar
 * @property string bg
 * @property string ca
 * @property string cr
 * @property string cz
 * @property string da
 * @property string el
 * @property string es
 * @property string et
 * @property string fi
 * @property string fr
 * @property string gl
 * @property string hu
 * @property string is
 * @property string it
 * @property string ja
 * @property string lt
 * @property string lv
 * @property string mk
 * @property string nl
 * @property string no
 * @property string pl
 * @property string pt
 * @property string pt_BR
 * @property string ro
 * @property string ru
 * @property string sv
 * @property string sr
 * @property string th
 * @property string tr
 * @property string uk
 * @property string zh
 * @property string updated_by
 */
class Language_lines extends Model
{

    public $table = 'language_lines';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'full_key',
        'group',
        'key',
        'source_file',
        'de',
        'en',
        'ar',
        'bg',
        'ca',
        'cr',
        'cz',
        'da',
        'el',
        'es',
        'et',
        'fi',
        'fr',
        'gl',
        'hu',
        'is',
        'it',
        'ja',
        'lt',
        'lv',
        'mk',
        'nl',
        'no',
        'pl',
        'pt',
        'pt_BR',
        'ro',
        'ru',
        'sv',
        'sr',
        'th',
        'tr',
        'uk',
        'zh',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'full_key' => 'string',
        'group' => 'string',
        'key' => 'string',
        'source_file' => 'string',
        'de' => 'string',
        'en' => 'string',
        'ar' => 'string',
        'bg' => 'string',
        'ca' => 'string',
        'cr' => 'string',
        'cz' => 'string',
        'da' => 'string',
        'el' => 'string',
        'es' => 'string',
        'et' => 'string',
        'fi' => 'string',
        'fr' => 'string',
        'gl' => 'string',
        'hu' => 'string',
        'is' => 'string',
        'it' => 'string',
        'ja' => 'string',
        'lt' => 'string',
        'lv' => 'string',
        'mk' => 'string',
        'nl' => 'string',
        'no' => 'string',
        'pl' => 'string',
        'pt' => 'string',
        'pt_BR' => 'string',
        'ro' => 'string',
        'ru' => 'string',
        'sv' => 'string',
        'sr' => 'string',
        'th' => 'string',
        'tr' => 'string',
        'uk' => 'string',
        'zh' => 'string',
        'updated_by' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
