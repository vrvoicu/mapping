<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('clients', 'ClientsController@index')->name('clients.index');
Route::get('clients/create', 'ClientsController@create')->name('clients.create');
Route::post('clients/store', 'ClientsController@store')->name('clients.store');

Route::get('mappings', 'MappingsController@index')->name('mappings.index');
Route::get('mappings/create', 'MappingsController@create')->name('mappings.create');
Route::post('mappings/store', 'MappingsController@store')->name('mappings.store');

Route::get('mapping-fields-values/{id}', 'MappingFieldsValuesController@index')->name('mapping-fields-values.index');
Route::get('mapping-fields-values/{id}/create', 'MappingFieldsValuesController@create')->name('mapping-fields-values.create');
Route::post('mapping-fields-values/{id}/store', 'MappingFieldsValuesController@store')->name('mapping-fields-values.store');