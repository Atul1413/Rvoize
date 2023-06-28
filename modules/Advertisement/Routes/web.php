<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'user', 'middleware'=> ['auth', 'verified']],function() {
    Route::get('/manage-ads', 'ManageAdvertisementController@index')->name('user.company.advertisement.manage.ads');
    Route::get('/new-ads', 'ManageAdvertisementController@createAd')->name('user.company.advertisement.create.ads');
    Route::get('/edit-ads/{id}', 'ManageAdvertisementController@editAd')->name('user.company.advertisement.edit.ads');
    Route::post('/store-ads/{id}', 'ManageAdvertisementController@storeAd')->name('user.company.advertisement.store.ads');
    Route::get('/delete-ads/{id}', 'ManageAdvertisementController@deleteAd')->name('user.company.advertisement.delete.ads');
});

