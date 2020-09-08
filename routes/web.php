<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/product/show/{id}', 'ProductController@show')->name('product.show');
});

Route::group([
    'prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::resource('category', 'CategoryController');
    Route::post('category/status/update/{id}', 'CategoryController@statusUpdate')->name('category.status.update');

    Route::resource('subcategory', 'SubCategoryController');
    Route::post('subcategory/status/update/{id}', 'SubCategoryController@statusUpdate')
        ->name('subcategory.status.update');

    Route::resource('childcategory', 'ChildCategoryController');
    Route::post('childcategory/status/update/{id}', 'ChildCategoryController@statusUpdate')
        ->name('childcategory.status.update');

    Route::resource('attribute', 'ProductAttributeController');
    // Route::resource('attribute/value', 'ProductAttributeValueController',
    // ['except' => ['index'], 'names' => 'attribute_value']);
    Route::get('attribute/value/{id}', 'ProductAttributeValueController@index')->name('attribute_value.index');
    Route::post('attribute/value/{id}', 'ProductAttributeValueController@store')->name('attribute_value.store');
    Route::get('value/{id}', 'ProductAttributeValueController@edit')->name('attribute_value.edit');
    Route::post('attribute/value/update/{id}', 'ProductAttributeValueController@update')
        ->name('attribute_value.update');

    Route::resource('product', 'ProductController');
    Route::post('product/feature/update/{id}', 'ProductController@featureUpdate')
        ->name('product.feature.update');
    Route::post('product/status/update/{id}', 'ProductController@statusUpdate')
        ->name('product.status.update');
    Route::post('product/bulk_delete', 'ProductController@bulkDelete')->name('product.bulk.delete');

    Route::get('product/variant/{id}', 'ProductVariantController@index')
        ->name('product.variant.index');
    Route::post('product/variant/{id}', 'ProductVariantController@store')
        ->name('product.variant.store');
    Route::post('product/variant/update/{id}', 'ProductVariantController@update')
        ->name('product.variant.update');

    Route::get('product/variant/values/{id}', 'ProductVariantValueController@index')
        ->name('product.variant.values.index');
    Route::get('product/variant/values/create/{id}', 'ProductVariantValueController@create')
        ->name('product.variant.values.create');
    Route::post('product/variant/values/store/{id}', 'ProductVariantValueController@store')
        ->name('product.variant.values.store');
    Route::get('product/variant/values/edit/{id}', 'ProductVariantValueController@edit')
        ->name('product.variant.values.edit');
    Route::post('product/variant/values/update/{id}', 'ProductVariantValueController@update')
        ->name('product.variant.values.update');
    Route::get('product/variant/values/destroy/{id}', 'ProductVariantValueController@destroy')
        ->name('product.variant.values.destroy');

    Route::get('search/subcategory/{id}', 'SearchController@getSubCategories');
    Route::get('search/childcategory/{id}', 'SearchController@getChildCategories');
    Route::get('search/attribute/value/{id}', 'SearchController@getAttributeValues');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
