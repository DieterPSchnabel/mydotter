<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.02.2018
 * Time: 23:07
 */

//https://lukaswhite.com/blog/running-laravel-artisan-commands-your-admin-dashboard-gui

Route::get('/commands/run/{command}', function($command)
{
    print '<div style="padding: 40px 90px;font-size:1.3em">';
    print '<div style="padding: 12px;background:#ffe">';
    print '<pre>';

    Artisan::call($command, array());



    echo (\Artisan::output());
    print '</pre>';
    print '</div>';
    print '<p style="background:#eee;color:green;font-size:0.7em;margin-top:60px;padding:9px;">done</p>';
    print '</div>';


});
