<?php

namespace App\Repositories;

use App\Models\Prods;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdsRepository
 * @package App\Repositories
 * @version January 19, 2018, 4:48 pm CET
 *
 * @method Prods findWithoutFail($id, $columns = ['*'])
 * @method Prods find($id, $columns = ['*'])
 * @method Prods first($columns = ['*'])
*/
class ProdsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'quantity',
        'model',
        'image',
        'mediumimage',
        'mediumimage_2',
        'largeimage',
        'largeimage_2',
        'originalimage',
        'subimage1',
        'subimage2',
        'subimage3',
        'subimage4',
        'subimage5',
        'subimage6',
        'subimage7',
        'subimage8',
        'subimage9',
        'subimage10',
        'subimage11',
        'subimage12',
        'subimage13',
        'subimage14',
        'subimage15',
        'subimage16',
        'subimage17',
        'subimage18',
        'subimage19',
        'subimage20',
        'subimage21',
        'subimage22',
        'subimage23',
        'subimage24',
        'subimage25',
        'price',
        'price_special',
        'price_temp',
        'price_special_temp',
        'weight',
        'status',
        'tax_class_id',
        'manufacturers_id',
        'ordered',
        'ordered_f',
        'ordered_ff',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'description_5',
        'description_6',
        'description_7',
        'description_8',
        'description_9',
        'description_10',
        'description_11',
        'description_12',
        'description_13',
        'description_14',
        'description_15',
        'description_16',
        'description_17',
        'description_18',
        'pnew',
        'hotshot',
        'soldout',
        'rare',
        'attr1',
        'attr2',
        'attr3',
        'attr4',
        'attr5',
        'attr6',
        'attr7',
        'attr8',
        'attr9',
        'attr10',
        'ab18',
        'unterordner',
        'sort_order',
        'ori_img_exists',
        'description_1_title',
        'description_2_title',
        'description_3_title',
        'description_4_title',
        'description_5_title',
        'description_6_title',
        'description_7_title',
        'description_8_title',
        'description_9_title',
        'description_10_title',
        'description_11_title',
        'description_12_title',
        'description_13_title',
        'description_14_title',
        'description_15_title',
        'description_16_title',
        'description_17_title',
        'description_18_title',
        'dvd_code',
        'temp',
        'pdf',
        'video',
        'pdf_p',
        'pdf_m',
        'pdf_c',
        'pdf_mc',
        'highlights_sort_order',
        'is_highlight',
        'mp3',
        'zbv1',
        'zbv2',
        'zbv3',
        'zbv4',
        'int_bemerkung',
        'temp_done'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Prods::class;
    }
}
