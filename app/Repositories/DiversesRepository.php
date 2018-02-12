<?php

namespace App\Repositories;

use App\Models\Diverses;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DiversesRepository
 * @package App\Repositories
 * @version February 5, 2018, 1:23 am CET
 *
 * @method Diverses findWithoutFail($id, $columns = ['*'])
 * @method Diverses find($id, $columns = ['*'])
 * @method Diverses first($columns = ['*'])
*/
class DiversesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Diverses::class;
    }
}
