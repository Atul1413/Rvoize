<?php

use Illuminate\Support\Facades\Route;


Route::get('/','AdvertisementController@index')->name('company.advertisement.admin.index');
Route::post('/approveAd','AdvertisementController@approveAd')->name('company.advertisement.admin.approveAd');
Route::post('/bulkEdit','AdvertisementController@bulkEdit')->name('company.advertisement.admin.bulkEdit');
