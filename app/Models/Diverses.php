<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Diverses
 * @package App\Models
 * @version February 5, 2018, 1:23 am CET
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string div_what
 * @property string div_res
 * @property string div_res_long
 * @property string div_res_de
 * @property string div_res_long_de
 * @property boolean app_top
 * @property boolean is_hint
 * @property string t_key_comment
 * @property string t_key_txt
 * @property string assi_title
 * @property string assi_typ
 * @property string help_key
 * @property integer sa
 * @property string manager_url
 * @property integer is_active_switch
 * @property integer c_theme
 * @property string pv_link
 * @property string be_fe
 * @property string type
 * @property string div_res_fr
 * @property string div_res_long_fr
 * @property string div_res_en
 * @property string div_res_long_en
 * @property string div_res_it
 * @property string div_res_long_it
 * @property string div_res_ru
 * @property string div_res_long_ru
 * @property string div_res_es
 * @property string div_res_long_es
 * @property string div_res_nl
 * @property string div_res_long_nl
 * @property string div_res_tr
 * @property string div_res_long_tr
 * @property string div_res_cr
 * @property string div_res_long_cr
 * @property string div_res_cz
 * @property string div_res_long_cz
 * @property string div_res_da
 * @property string div_res_long_da
 * @property string div_res_fi
 * @property string div_res_long_fi
 * @property string div_res_no
 * @property string div_res_long_no
 * @property string div_res_pl
 * @property string div_res_long_pl
 * @property string div_res_pt
 * @property string div_res_long_pt
 * @property string div_res_ro
 * @property string div_res_long_ro
 * @property string div_res_sr
 * @property string div_res_long_sr
 * @property string div_res_sv
 * @property string div_res_long_sv
 * @property string div_res_bg
 * @property string div_res_long_bg
 * @property string div_res_ca
 * @property string div_res_long_ca
 * @property string div_res_et
 * @property string div_res_long_et
 * @property string div_res_gl
 * @property string div_res_long_gl
 * @property string div_res_el
 * @property string div_res_long_el
 * @property string div_res_hu
 * @property string div_res_long_hu
 * @property string div_res_is
 * @property string div_res_long_is
 * @property string div_res_lv
 * @property string div_res_long_lv
 * @property string div_res_mk
 * @property string div_res_long_mk
 * @property string div_res_uk
 * @property string div_res_long_uk
 * @property string div_res_zh
 * @property string div_res_long_zh
 * @property string div_res_th
 * @property string div_res_long_th
 * @property string div_res_pt_BR
 * @property string div_res_long_pt_BR
 * @property string div_res_lt
 * @property string div_res_long_lt
 * @property string div_res_ja
 * @property string div_res_long_ja
 * @property string div_res_ar
 * @property string div_res_long_ar
 * @property string updated_by
 */
class Diverses extends Model
{

    public $table = 'diverses';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'div_what',
        'div_res',
        'div_res_long',
        'div_res_de',
        'div_res_long_de',
        'app_top',
        'is_hint',
        't_key_comment',
        't_key_txt',
        'assi_title',
        'assi_typ',
        'help_key',
        'sa',
        'manager_url',
        'is_active_switch',
        'c_theme',
        'pv_link',
        'be_fe',
        'type',
        'div_res_fr',
        'div_res_long_fr',
        'div_res_en',
        'div_res_long_en',
        'div_res_it',
        'div_res_long_it',
        'div_res_ru',
        'div_res_long_ru',
        'div_res_es',
        'div_res_long_es',
        'div_res_nl',
        'div_res_long_nl',
        'div_res_tr',
        'div_res_long_tr',
        'div_res_cr',
        'div_res_long_cr',
        'div_res_cz',
        'div_res_long_cz',
        'div_res_da',
        'div_res_long_da',
        'div_res_fi',
        'div_res_long_fi',
        'div_res_no',
        'div_res_long_no',
        'div_res_pl',
        'div_res_long_pl',
        'div_res_pt',
        'div_res_long_pt',
        'div_res_ro',
        'div_res_long_ro',
        'div_res_sr',
        'div_res_long_sr',
        'div_res_sv',
        'div_res_long_sv',
        'div_res_bg',
        'div_res_long_bg',
        'div_res_ca',
        'div_res_long_ca',
        'div_res_et',
        'div_res_long_et',
        'div_res_gl',
        'div_res_long_gl',
        'div_res_el',
        'div_res_long_el',
        'div_res_hu',
        'div_res_long_hu',
        'div_res_is',
        'div_res_long_is',
        'div_res_lv',
        'div_res_long_lv',
        'div_res_mk',
        'div_res_long_mk',
        'div_res_uk',
        'div_res_long_uk',
        'div_res_zh',
        'div_res_long_zh',
        'div_res_th',
        'div_res_long_th',
        'div_res_pt_BR',
        'div_res_long_pt_BR',
        'div_res_lt',
        'div_res_long_lt',
        'div_res_ja',
        'div_res_long_ja',
        'div_res_ar',
        'div_res_long_ar',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'div_what' => 'string',
        'div_res' => 'string',
        'div_res_long' => 'string',
        'div_res_de' => 'string',
        'div_res_long_de' => 'string',
        'app_top' => 'boolean',
        'is_hint' => 'boolean',
        't_key_comment' => 'string',
        't_key_txt' => 'string',
        'assi_title' => 'string',
        'assi_typ' => 'string',
        'help_key' => 'string',
        'sa' => 'integer',
        'manager_url' => 'string',
        'is_active_switch' => 'integer',
        'c_theme' => 'integer',
        'pv_link' => 'string',
        'be_fe' => 'string',
        'type' => 'string',
        'div_res_fr' => 'string',
        'div_res_long_fr' => 'string',
        'div_res_en' => 'string',
        'div_res_long_en' => 'string',
        'div_res_it' => 'string',
        'div_res_long_it' => 'string',
        'div_res_ru' => 'string',
        'div_res_long_ru' => 'string',
        'div_res_es' => 'string',
        'div_res_long_es' => 'string',
        'div_res_nl' => 'string',
        'div_res_long_nl' => 'string',
        'div_res_tr' => 'string',
        'div_res_long_tr' => 'string',
        'div_res_cr' => 'string',
        'div_res_long_cr' => 'string',
        'div_res_cz' => 'string',
        'div_res_long_cz' => 'string',
        'div_res_da' => 'string',
        'div_res_long_da' => 'string',
        'div_res_fi' => 'string',
        'div_res_long_fi' => 'string',
        'div_res_no' => 'string',
        'div_res_long_no' => 'string',
        'div_res_pl' => 'string',
        'div_res_long_pl' => 'string',
        'div_res_pt' => 'string',
        'div_res_long_pt' => 'string',
        'div_res_ro' => 'string',
        'div_res_long_ro' => 'string',
        'div_res_sr' => 'string',
        'div_res_long_sr' => 'string',
        'div_res_sv' => 'string',
        'div_res_long_sv' => 'string',
        'div_res_bg' => 'string',
        'div_res_long_bg' => 'string',
        'div_res_ca' => 'string',
        'div_res_long_ca' => 'string',
        'div_res_et' => 'string',
        'div_res_long_et' => 'string',
        'div_res_gl' => 'string',
        'div_res_long_gl' => 'string',
        'div_res_el' => 'string',
        'div_res_long_el' => 'string',
        'div_res_hu' => 'string',
        'div_res_long_hu' => 'string',
        'div_res_is' => 'string',
        'div_res_long_is' => 'string',
        'div_res_lv' => 'string',
        'div_res_long_lv' => 'string',
        'div_res_mk' => 'string',
        'div_res_long_mk' => 'string',
        'div_res_uk' => 'string',
        'div_res_long_uk' => 'string',
        'div_res_zh' => 'string',
        'div_res_long_zh' => 'string',
        'div_res_th' => 'string',
        'div_res_long_th' => 'string',
        'div_res_pt_BR' => 'string',
        'div_res_long_pt_BR' => 'string',
        'div_res_lt' => 'string',
        'div_res_long_lt' => 'string',
        'div_res_ja' => 'string',
        'div_res_long_ja' => 'string',
        'div_res_ar' => 'string',
        'div_res_long_ar' => 'string',
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
