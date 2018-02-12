<?php

namespace App\Repositories;

use App\Models\Language_lines;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Language_linesRepository
 * @package App\Repositories
 * @version February 1, 2018, 10:29 pm CET
 *
 * @method Language_lines findWithoutFail($id, $columns = ['*'])
 * @method Language_lines find($id, $columns = ['*'])
 * @method Language_lines first($columns = ['*'])
*/
class Language_linesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Language_lines::class;
    }
}
