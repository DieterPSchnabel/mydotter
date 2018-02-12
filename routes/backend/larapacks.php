<?php

// prefixed mit admin !

//installed_as_per_decomposer
Route::get('dashboard/installed_as_per_decomposer', 'Larapack\LarapackController@installed_as_per_decomposer')
    ->name('dashboard.installed_as_per_decomposer');

Route::get('dashboard/larapacks/export/{type}', ['as'=> 'admin.larapacks.export.{type}',
    'uses' => 'Larapack\LarapackController@export']);

Route::get('dashboard/larapacks', 'Larapack\LarapackController@index')
    ->name('dashboard.larapacks');

Route::get('dashboard/larapacks/create','Larapack\LarapackController@create')
    ->name('dashboard.larapacks.create');

Route::get('dashboard/larapacks/edit/{id}','Larapack\LarapackController@edit')
    ->name('dashboard.larapacks.edit');

Route::post('dashboard/larapacks/update/{id}','Larapack\LarapackController@update')
    ->name('dashboard.larapacks.update');

Route::delete('dashboard/larapacks/delete/{id}','Larapack\LarapackController@destroy')
    ->name('dashboard.larapacks.delete');

Route::post('dashboard/larapacks/store','Larapack\LarapackController@store')
    ->name('dashboard.larapacks.store');

