<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Products
 * @package App\Models
 * @version January 19, 2018, 5:32 pm CET
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer quantity
 * @property string model
 * @property string image
 * @property string mediumimage
 * @property string mediumimage_2
 * @property string largeimage
 * @property string largeimage_2
 * @property string originalimage
 * @property string subimage1
 * @property string subimage2
 * @property string subimage3
 * @property string subimage4
 * @property string subimage5
 * @property string subimage6
 * @property string subimage7
 * @property string subimage8
 * @property string subimage9
 * @property string subimage10
 * @property string subimage11
 * @property string subimage12
 * @property string subimage13
 * @property string subimage14
 * @property string subimage15
 * @property string subimage16
 * @property string subimage17
 * @property string subimage18
 * @property string subimage19
 * @property string subimage20
 * @property string subimage21
 * @property string subimage22
 * @property string subimage23
 * @property string subimage24
 * @property string subimage25
 * @property decimal price
 * @property decimal price_special
 * @property decimal price_temp
 * @property decimal price_special_temp
 * @property decimal weight
 * @property boolean status
 * @property integer tax_class_id
 * @property integer manufacturers_id
 * @property integer ordered
 * @property integer ordered_f
 * @property integer ordered_ff
 * @property string description_1
 * @property string description_2
 * @property string description_3
 * @property string description_4
 * @property string description_5
 * @property string description_6
 * @property string description_7
 * @property string description_8
 * @property string description_9
 * @property string description_10
 * @property string description_11
 * @property string description_12
 * @property string description_13
 * @property string description_14
 * @property string description_15
 * @property string description_16
 * @property string description_17
 * @property string description_18
 * @property string pnew
 * @property string hotshot
 * @property string soldout
 * @property integer rare
 * @property integer attr1
 * @property integer attr2
 * @property integer attr3
 * @property integer attr4
 * @property integer attr5
 * @property integer attr6
 * @property integer attr7
 * @property integer attr8
 * @property integer attr9
 * @property integer attr10
 * @property integer ab18
 * @property string unterordner
 * @property integer sort_order
 * @property boolean ori_img_exists
 * @property string description_1_title
 * @property string description_2_title
 * @property string description_3_title
 * @property string description_4_title
 * @property string description_5_title
 * @property string description_6_title
 * @property string description_7_title
 * @property string description_8_title
 * @property string description_9_title
 * @property string description_10_title
 * @property string description_11_title
 * @property string description_12_title
 * @property string description_13_title
 * @property string description_14_title
 * @property string description_15_title
 * @property string description_16_title
 * @property string description_17_title
 * @property string description_18_title
 * @property string dvd_code
 * @property integer temp
 * @property string pdf
 * @property string video
 * @property string pdf_p
 * @property string pdf_m
 * @property string pdf_c
 * @property string pdf_mc
 * @property integer highlights_sort_order
 * @property string is_highlight
 * @property string mp3
 * @property string zbv1
 * @property string zbv2
 * @property string zbv3
 * @property string zbv4
 * @property string int_bemerkung
 * @property boolean temp_done
 */
class Products extends Model
{

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'quantity' => 'integer',
        'model' => 'string',
        'image' => 'string',
        'mediumimage' => 'string',
        'mediumimage_2' => 'string',
        'largeimage' => 'string',
        'largeimage_2' => 'string',
        'originalimage' => 'string',
        'subimage1' => 'string',
        'subimage2' => 'string',
        'subimage3' => 'string',
        'subimage4' => 'string',
        'subimage5' => 'string',
        'subimage6' => 'string',
        'subimage7' => 'string',
        'subimage8' => 'string',
        'subimage9' => 'string',
        'subimage10' => 'string',
        'subimage11' => 'string',
        'subimage12' => 'string',
        'subimage13' => 'string',
        'subimage14' => 'string',
        'subimage15' => 'string',
        'subimage16' => 'string',
        'subimage17' => 'string',
        'subimage18' => 'string',
        'subimage19' => 'string',
        'subimage20' => 'string',
        'subimage21' => 'string',
        'subimage22' => 'string',
        'subimage23' => 'string',
        'subimage24' => 'string',
        'subimage25' => 'string',
        'status' => 'boolean',
        'tax_class_id' => 'integer',
        'manufacturers_id' => 'integer',
        'ordered' => 'integer',
        'ordered_f' => 'integer',
        'ordered_ff' => 'integer',
        'description_1' => 'string',
        'description_2' => 'string',
        'description_3' => 'string',
        'description_4' => 'string',
        'description_5' => 'string',
        'description_6' => 'string',
        'description_7' => 'string',
        'description_8' => 'string',
        'description_9' => 'string',
        'description_10' => 'string',
        'description_11' => 'string',
        'description_12' => 'string',
        'description_13' => 'string',
        'description_14' => 'string',
        'description_15' => 'string',
        'description_16' => 'string',
        'description_17' => 'string',
        'description_18' => 'string',
        'pnew' => 'string',
        'hotshot' => 'string',
        'soldout' => 'string',
        'rare' => 'integer',
        'attr1' => 'integer',
        'attr2' => 'integer',
        'attr3' => 'integer',
        'attr4' => 'integer',
        'attr5' => 'integer',
        'attr6' => 'integer',
        'attr7' => 'integer',
        'attr8' => 'integer',
        'attr9' => 'integer',
        'attr10' => 'integer',
        'ab18' => 'integer',
        'unterordner' => 'string',
        'sort_order' => 'integer',
        'ori_img_exists' => 'boolean',
        'description_1_title' => 'string',
        'description_2_title' => 'string',
        'description_3_title' => 'string',
        'description_4_title' => 'string',
        'description_5_title' => 'string',
        'description_6_title' => 'string',
        'description_7_title' => 'string',
        'description_8_title' => 'string',
        'description_9_title' => 'string',
        'description_10_title' => 'string',
        'description_11_title' => 'string',
        'description_12_title' => 'string',
        'description_13_title' => 'string',
        'description_14_title' => 'string',
        'description_15_title' => 'string',
        'description_16_title' => 'string',
        'description_17_title' => 'string',
        'description_18_title' => 'string',
        'dvd_code' => 'string',
        'temp' => 'integer',
        'pdf' => 'string',
        'video' => 'string',
        'pdf_p' => 'string',
        'pdf_m' => 'string',
        'pdf_c' => 'string',
        'pdf_mc' => 'string',
        'highlights_sort_order' => 'integer',
        'is_highlight' => 'string',
        'mp3' => 'string',
        'zbv1' => 'string',
        'zbv2' => 'string',
        'zbv3' => 'string',
        'zbv4' => 'string',
        'int_bemerkung' => 'string',
        'temp_done' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
