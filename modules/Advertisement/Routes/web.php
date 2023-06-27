<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'user', 'middleware'=> ['auth', 'verified']],function() {
    Route::get('/manage-ads', 'AdvertisementController@index')->name('user.company.advertisement.manage.jobs');
    Route::get('/new-ads', 'AdvertisementController@createAd')->name('user.company.advertisement.create.job');
    // Route::get('/edit-job/{id}', 'AdvertisementController@editJob')->name('user.company.advertisement.edit.job');
    // Route::post('/store-job/{id}', 'AdvertisementController@storeJob')->name('user.company.advertisement.store.job');
    // Route::get('/delete-job/{id}', 'AdvertisementController@deleteJob')->name('user.company.advertisement.delete.job');
});

