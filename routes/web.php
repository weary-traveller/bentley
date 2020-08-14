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
    return view('auth/login');
});

Auth::routes();

//bulk data upload through excel
Route::get('/upload', 'UploadFileController@index')->name('upload');
Route::post('/upload/uploaddata','UploadFileController@UploadFileData')->name('uploaddata');

//bulk data download via excel
Route::get('/upload/downloaddatadisplay','UploadFileController@DownloadFileDataDisplay')->name('downloaddatadisplay');
Route::post('/upload/downloaddata','UploadFileController@DownloadFileData')->name('downloaddata');

//display all data
Route::get('/upload/displaydata','UploadFileController@DisplayFileData')->name('displaydata');

//delete individual entry
Route::post('/upload/deletedata','UploadFileController@DeleteFileData')->name('deletedata');

//update individual entry
Route::post('/upload/updatedata','UploadFileController@UpdateFileData')->name('updatedata');
Route::get('/upload/displayupdatedata/{id}','UploadFileController@DisplayUpdateFileData')->name('displayupdatedata');

//add individual entry
Route::get('/upload/displayadddata','UploadFileController@DisplayAddFileData')->name('displayadddata');
Route::post('/upload/adddata','UploadFileController@AddFileData')->name('adddata');

//data service
Route::get('/dataservice','DataServiceController@DataService')->name('dataservice');
Route::post('/dataservicereturn','DataServiceController@DataServiceReturn')->name('dataservicereturn');



