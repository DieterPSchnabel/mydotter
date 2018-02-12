<?php

namespace App\Repositories;

use App\Models\Countries;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CountriesRepository
 * @package App\Repositories
 * @version December 14, 2017, 3:09 pm CET
 *
 * @method Countries findWithoutFail($id, $columns = ['*'])
 * @method Countries find($id, $columns = ['*'])
 * @method Countries first($columns = ['*'])
*/
class CountriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Countries::class;
    }
}
