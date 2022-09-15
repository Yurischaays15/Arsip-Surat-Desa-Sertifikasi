<?php

//halaman utama
Route::get('/', 'ArsipSuratController@viewall')->name('arsipsurat');

//about
Route::get('about', 'aboutController@index')->name('about');

//tambah arsip surat
Route::get('arsipsurat/create', 'ArsipSuratController@create')->name('create');
Route::post('arsipsurat/store', 'ArsipSuratController@store')->name('store');

//lihat surat
Route::get('arsipsurat/show/{id_arsipsurat}', 'ArsipSuratController@show')->name('show');

//edit data surat
Route::get('arsipsurat/edit/{id_arsipsurat}', 'ArsipSuratController@edit')->name('edit');

//update file surat
Route::post('arsipsurat/update/{id_arsipsurat}', 'ArsipSuratController@update')->name('update');

//hapus surat
Route::delete('arsipsurat/delete/{id_arsipsurat}', 'ArsipSuratController@delete')->name('delete');
