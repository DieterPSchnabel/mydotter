<?php


function get_larapack_tag_arr()
{
    /*$arr = ['Artisan','Blade','Eloquent','DB','Migration','Auth','Translation','Javascript','Debug','Storage','Routes','HTML','Navigation','Datetime','Log'];*/
    $arr = array('Artisan','Blade','Cache','Eloquent','DB','Migration','Auth',
        'Translation','Javascript','Debug','Storage','Routes','HTML',
        'Navigation','Datetime','Log','Bootstrap 4','Mailables','E-Commerce',
        'Social Authentication','Vue','CRUD','Solution','Helpers','Configuration','!important!','isInfo','pearltree','Online-Tool','Cheatsheet');
    sort($arr);
    return $arr;
}

function get_pearltree_tag_arr()
{
    /*$arr = ['Artisan','Blade','Eloquent','DB','Migration','Auth','Translation','Javascript','Debug','Storage','Routes','HTML','Navigation','Datetime','Log'];*/
    $arr = array(
        'Artisan',
        'Blade',
        'Bootstrap3',
        'Bootstrap4',
        'Bootstrap4 Flex',

        '--'
    );
    sort($arr);
    return $arr;
}

function installed_larapacks(){

    $list = '
 - appstract/laravel-blade-directives : ^0.7.0
 - appstract/laravel-options : ^0.4.0
 - arcanedev/log-viewer : ^4.4
 - arcanedev/no-captcha : ^5.0
 - awssat/str-helper : ^1.4
 - barryvdh/laravel-elfinder : ^0.3.11
 - barryvdh/laravel-snappy : ^0.4.0
 - brian2694/laravel-toastr : ^5.5
 - brotzka/laravel-dotenv-editor : ^2.0
 - browner12/helpers : ^2.1
 - creativeorange/gravatar : ~1.0
 - davejamesmiller/laravel-breadcrumbs : ^4.1
 - doctrine/dbal : ~2.3
 - dompdf/dompdf : ^0.8.1
 - elibyy/tcpdf-laravel : ^5.5
 - fideloper/proxy : ~3.3
 - garygreen/pretty-routes : ^1.0
 - hieu-le/active : ^3.5
 - illuminated/helper-functions : ^5.5
 - infyomlabs/adminlte-templates : 5.5.x-dev
 - infyomlabs/laravel-generator : 5.5.x-dev
 - infyomlabs/swagger-generator : dev-master
 - jenssegers/date : ^3.2
 - jlapp/swaggervel : dev-master
 - laracasts/utilities : ^3.0
 - laravel/framework : 5.5.*
 - laravel/socialite : ^3.0
 - laravel/tinker : ~1.0
 - laravelcollective/html : ^5.4.0
 - lubusin/laravel-decomposer : ^1.2
 - maatwebsite/excel : ~2.1.0
 - marabesi/laration : ^1.1
 - nikaia/translation-sheet : ^1.2
 - spatie/laravel-activitylog : ^2.3
 - spatie/laravel-artisan-dd : ^2.0
 - spatie/laravel-backup : ^5.1
 - spatie/laravel-blade-javascript : ^2.0
 - spatie/laravel-cookie-consent : ^2.1
 - spatie/laravel-db-snapshots : ^1.1
 - spatie/laravel-glide : ^3.2
 - spatie/laravel-html : ^2.4
 - spatie/laravel-link-checker : ^2.2
 - spatie/laravel-mailable-test : ^2.0
 - spatie/laravel-medialibrary : 6.0.0
 - spatie/laravel-menu : ^3.0
 - spatie/laravel-newsletter : ^4.1
 - spatie/laravel-partialcache : ^1.2
 - spatie/laravel-permission : ^2.5
 - spatie/laravel-sitemap : ^3.3
 - spatie/laravel-sluggable : ^2.1
 - spatie/laravel-tags : ^2.0
 - spatie/laravel-tail : ^2.0
 - spatie/laravel-translatable : ^2.1
 - spatie/laravel-translation-loader : ^2.1
 - webpatser/laravel-uuid : ^3.0
 - yajra/laravel-datatables-buttons : 3.0
 - yajra/laravel-datatables-html : 3.0
 - yajra/laravel-datatables-oracle : ~8.0
    ';

    $list_array = explode('- ',$list);
    $r='';
    $affected='';
    $affected = DB::update("update larapacks set is_installed = 0");
    foreach($list_array as $pack ){

        $pack = trim($pack);
        $pack1 = explode(':',$pack);
        $pack1 = trim($pack1[0]);

        $in_db = false;
        $in_db =  lookup('larapacks', 'install_str', $pack1, $id_field ='install_str' );
        if($in_db) {
            //$affected = DB::update("update larapacks set is_installed = 1, updated_at = NOW()  where 'install_str' = ?", [$pack1]);

            //$affected = DB::update("update larapacks set is_installed = 1 where 'install_str' = ?", [$pack1]);

            $larapack_id = lookup('larapacks', 'id', $pack1, $id_field ='install_str' );

            $affected = DB::update("update larapacks set is_installed = 1 where id = ?", [$larapack_id]);
            //if($pack1=='spatie/laravel-glide') dd($larapack_id);
            $pack1 .= ' - <a target="_blank" href="larapacks?myid='.$larapack_id.'">open details in larapacks</a>';
        }else{
            if( trim($pack1) <> '' ) {
                $affected = DB::table('larapacks')->insert(
                    ['install_str' => $pack1, 'is_installed' => 1]
                );
                $pack1 .= ' -------------- neu in DB';
            }

        }
        $r .= $pack1 . '<br>';
    }
    return $r;
}

