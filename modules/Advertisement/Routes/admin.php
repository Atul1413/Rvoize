<?php

use Illuminate\Support\Facades\Route;


Route::get('/','AdvertisementController@index')->name('company.advertisement.admin.index');
// Route::get('/create','CandidateController@create')->name('candidate.admin.create');
// Route::get('/edit/{id}', 'CandidateController@edit')->name('candidate.admin.edit');
// Route::post('/bulkEdit','CandidateController@bulkEdit')->name('candidate.admin.bulkEdit');
// Route::post('/store/{id}','CandidateController@store')->name('candidate.admin.store');
// Route::get('/getForSelect2','CandidateController@getForSelect2')->name('candidate.admin.getForSelect2');
