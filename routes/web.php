<?php

/**
 * Global Routes
 * Routes that are used between both frontend and backend.
 */
//Route::post('axfe','AjaxController@index')->name('frontend.axfe');
Route::post('axfe','AjaxController@index');
// Switch between the included languages
Route::get('lang/{lang}', 'LanguageController@swap');

/*
 * Frontend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
    include_route_files(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 * Namespaces indicate folder structure
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    /*
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     * These routes can not be hit if the password is expired
     */
    Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');

    include_route_files(__DIR__.'/backend/');

});

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/diverses/export/{type}', ['as'=> 'admin.diverses.export.{type}','uses' => 'DiversesController@export']);
    Route::get('admin/diverses', ['as'=> 'admin.diverses.index', 'uses' => 'DiversesController@index']);
    Route::post('admin/diverses', ['as'=> 'admin.diverses.store', 'uses' => 'DiversesController@store']);
    Route::get('admin/diverses/create', ['as'=> 'admin.diverses.create', 'uses' => 'DiversesController@create']);

    Route::patch('admin/diverses/update_field_by_id/{diverses}', ['as'=> 'admin.diverses.update_field_by_id', 'uses' => 'DiversesController@update_field_by_id']);

    Route::patch('admin/diverses/update_long_field_by_div_what/{diverses}', ['as'=> 'admin.diverses.update_long_field_by_div_what', 'uses' => 'DiversesController@update_long_field_by_div_what']);

    Route::put('admin/diverses/{diverses}', ['as'=> 'admin.diverses.update', 'uses' => 'DiversesController@update']);
    Route::patch('admin/diverses/{diverses}', ['as'=> 'admin.diverses.update', 'uses' => 'DiversesController@update']);

    Route::delete('admin/diverses/{diverses}', ['as'=> 'admin.diverses.destroy', 'uses' => 'DiversesController@destroy']);
    Route::get('admin/diverses/{diverses}', ['as'=> 'admin.diverses.show', 'uses' => 'DiversesController@show']);
    Route::get('admin/diverses/{diverses}/edit', ['as'=> 'admin.diverses.edit', 'uses' => 'DiversesController@edit']);



});





/**
 * All route names are prefixed with 'admin.'.
 */
Route::group(['middleware' => 'admin'], function () {
    //hints in one or more langs
    Route::get('dashboard/pop1', function () {
        return View('backend.popups.pop1');
    });

    Route::get('dashboard/pop2', function () {
        return View('backend.popups.pop2');
    });

    //ckeditor
    Route::get('dashboard/pop3', function () {
        return View('backend.popups.pop3');
    });

    Route::get('dashboard/pop_dev_links', function () {
        return View('backend.popups.pop_dev_links');
    });
    Route::get('dashboard/pop_dev_helpers', function () {
        return View('backend.popups.pop_dev_helpers');
    });
    Route::get('dashboard/pop_dev_howto', function () {
        return View('backend.popups.pop_dev_howto');
    });
    Route::get('dashboard/pop_dev_info', function () {
        return View('backend.popups.pop_dev_info');
    });
    Route::get('dashboard/pop_dev_settings', function () {
        return View('backend.popups.pop_dev_settings');
    });
    Route::get('dashboard/pop_dev_any_at', function () {
        return View('backend.popups.pop_dev_any_at');
    });



    Route::get('dashboard/pop_notes_admin', function () {
        return View('backend.popups.pop_notes_admin');
    });

    Route::get('dashboard/pop_notes_superadmin', function () {
        return View('backend.popups.pop_notes_superadmin');
    });

    Route::get('dashboard/pop_dev_links', function () {
        return View('backend.popups.pop_dev_links');
    });

    Route::get('dashboard/pop_div_res_short', function () {
        return View('backend.popups.pop_div_res_short');
    });

    Route::get('admin/languages/export/{type}', ['as'=> 'admin.languages.export.{type}','uses' => 'LanguagesController@export']);
    Route::get('admin/languages', ['as'=> 'admin.languages.index', 'uses' => 'LanguagesController@index']);
    Route::post('admin/languages', ['as'=> 'admin.languages.store', 'uses' => 'LanguagesController@store']);
    Route::get('admin/languages/create', ['as'=> 'admin.languages.create', 'uses' => 'LanguagesController@create']);
    Route::put('admin/languages/{languages}', ['as'=> 'admin.languages.update', 'uses' => 'LanguagesController@update']);
    Route::patch('admin/languages/{languages}', ['as'=> 'admin.languages.update', 'uses' => 'LanguagesController@update']);
    Route::delete('admin/languages/{languages}', ['as'=> 'admin.languages.destroy', 'uses' => 'LanguagesController@destroy']);
    Route::get('admin/languages/{languages}', ['as'=> 'admin.languages.show', 'uses' => 'LanguagesController@show']);
    Route::get('admin/languages/{languages}/edit', ['as'=> 'admin.languages.edit', 'uses' => 'LanguagesController@edit']);


    Route::get('admin/countries/export/{type}', ['as'=> 'admin.countries.export.{type}','uses' => 'CountriesController@export']);
    Route::get('admin/countries', ['as'=> 'admin.countries.index', 'uses' => 'CountriesController@index']);
    Route::post('admin/countries', ['as'=> 'admin.countries.store', 'uses' => 'CountriesController@store']);
    Route::get('admin/countries/create', ['as'=> 'admin.countries.create', 'uses' => 'CountriesController@create']);
    Route::put('admin/countries/{countries}', ['as'=> 'admin.countries.update', 'uses' => 'CountriesController@update']);
    Route::patch('admin/countries/{countries}', ['as'=> 'admin.countries.update', 'uses' => 'CountriesController@update']);
    Route::delete('admin/countries/{countries}', ['as'=> 'admin.countries.destroy', 'uses' => 'CountriesController@destroy']);
    Route::get('admin/countries/{countries}', ['as'=> 'admin.countries.show', 'uses' => 'CountriesController@show']);
    Route::get('admin/countries/{countries}/edit', ['as'=> 'admin.countries.edit', 'uses' => 'CountriesController@edit']);

});




























Route::get('admin/prods/export/{type}', ['as'=> 'admin.prods.export.{type}','uses' => 'ProdsController@export']);
Route::get('admin/prods', ['as'=> 'admin.prods.index', 'uses' => 'ProdsController@index']);
Route::post('admin/prods', ['as'=> 'admin.prods.store', 'uses' => 'ProdsController@store']);
Route::get('admin/prods/create', ['as'=> 'admin.prods.create', 'uses' => 'ProdsController@create']);
Route::put('admin/prods/{prods}', ['as'=> 'admin.prods.update', 'uses' => 'ProdsController@update']);
Route::patch('admin/prods/{prods}', ['as'=> 'admin.prods.update', 'uses' => 'ProdsController@update']);
Route::delete('admin/prods/{prods}', ['as'=> 'admin.prods.destroy', 'uses' => 'ProdsController@destroy']);
Route::get('admin/prods/{prods}', ['as'=> 'admin.prods.show', 'uses' => 'ProdsController@show']);
Route::get('admin/prods/{prods}/edit', ['as'=> 'admin.prods.edit', 'uses' => 'ProdsController@edit']);


Route::get('admin/prods/export/{type}', ['as'=> 'admin.prods.export.{type}','uses' => 'ProdsController@export']);
Route::get('admin/prods', ['as'=> 'admin.prods.index', 'uses' => 'ProdsController@index']);
Route::post('admin/prods', ['as'=> 'admin.prods.store', 'uses' => 'ProdsController@store']);
Route::get('admin/prods/create', ['as'=> 'admin.prods.create', 'uses' => 'ProdsController@create']);
Route::put('admin/prods/{prods}', ['as'=> 'admin.prods.update', 'uses' => 'ProdsController@update']);
Route::patch('admin/prods/{prods}', ['as'=> 'admin.prods.update', 'uses' => 'ProdsController@update']);
Route::delete('admin/prods/{prods}', ['as'=> 'admin.prods.destroy', 'uses' => 'ProdsController@destroy']);
Route::get('admin/prods/{prods}', ['as'=> 'admin.prods.show', 'uses' => 'ProdsController@show']);
Route::get('admin/prods/{prods}/edit', ['as'=> 'admin.prods.edit', 'uses' => 'ProdsController@edit']);










Route::get('admin/products/export/{type}', ['as'=> 'admin.products.export.{type}','uses' => 'ProductsController@export']);
Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'ProductsController@index']);
Route::post('admin/products', ['as'=> 'admin.products.store', 'uses' => 'ProductsController@store']);
Route::get('admin/products/create', ['as'=> 'admin.products.create', 'uses' => 'ProductsController@create']);
Route::put('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'ProductsController@update']);
Route::patch('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'ProductsController@update']);
Route::delete('admin/products/{products}', ['as'=> 'admin.products.destroy', 'uses' => 'ProductsController@destroy']);
Route::get('admin/products/{products}', ['as'=> 'admin.products.show', 'uses' => 'ProductsController@show']);
Route::get('admin/products/{products}/edit', ['as'=> 'admin.products.edit', 'uses' => 'ProductsController@edit']);


































Route::get('admin/languageLines/export/{type}', ['as'=> 'admin.languageLines.export.{type}','uses' => 'Language_linesController@export']);
Route::get('admin/languageLines', ['as'=> 'admin.languageLines.index', 'uses' => 'Language_linesController@index']);
Route::post('admin/languageLines', ['as'=> 'admin.languageLines.store', 'uses' => 'Language_linesController@store']);
Route::get('admin/languageLines/create', ['as'=> 'admin.languageLines.create', 'uses' => 'Language_linesController@create']);
Route::put('admin/languageLines/{languageLines}', ['as'=> 'admin.languageLines.update', 'uses' => 'Language_linesController@update']);
Route::patch('admin/languageLines/{languageLines}', ['as'=> 'admin.languageLines.update', 'uses' => 'Language_linesController@update']);
Route::delete('admin/languageLines/{languageLines}', ['as'=> 'admin.languageLines.destroy', 'uses' => 'Language_linesController@destroy']);
Route::get('admin/languageLines/{languageLines}', ['as'=> 'admin.languageLines.show', 'uses' => 'Language_linesController@show']);
Route::get('admin/languageLines/{languageLines}/edit', ['as'=> 'admin.languageLines.edit', 'uses' => 'Language_linesController@edit']);


Route::get('admin/diverses/export/{type}', ['as'=> 'admin.diverses.export.{type}','uses' => 'DiversesController@export']);
Route::get('admin/diverses', ['as'=> 'admin.diverses.index', 'uses' => 'DiversesController@index']);
Route::post('admin/diverses', ['as'=> 'admin.diverses.store', 'uses' => 'DiversesController@store']);
Route::get('admin/diverses/create', ['as'=> 'admin.diverses.create', 'uses' => 'DiversesController@create']);
Route::put('admin/diverses/{diverses}', ['as'=> 'admin.diverses.update', 'uses' => 'DiversesController@update']);
Route::patch('admin/diverses/{diverses}', ['as'=> 'admin.diverses.update', 'uses' => 'DiversesController@update']);
Route::delete('admin/diverses/{diverses}', ['as'=> 'admin.diverses.destroy', 'uses' => 'DiversesController@destroy']);
Route::get('admin/diverses/{diverses}', ['as'=> 'admin.diverses.show', 'uses' => 'DiversesController@show']);
Route::get('admin/diverses/{diverses}/edit', ['as'=> 'admin.diverses.edit', 'uses' => 'DiversesController@edit']);
