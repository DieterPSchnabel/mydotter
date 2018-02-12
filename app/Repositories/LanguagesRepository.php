<?php

namespace App\Repositories;

use App\Models\Languages;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LanguagesRepository
 * @package App\Repositories
 * @version December 14, 2017, 2:56 pm CET
 *
 * @method Languages findWithoutFail($id, $columns = ['*'])
 * @method Languages find($id, $columns = ['*'])
 * @method Languages first($columns = ['*'])
*/
class LanguagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'lara_code',
        'image',
        'directory',
        'sort_order',
        'status',
        'rtl',
        'fallback_frontend',
        'fallback_backend'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Languages::class;
    }
}
