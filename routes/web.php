<?php


Route::get('/', function () {
    return view('app');
});


Route::get('/admin', function () {
    return view('admin');
});






/////////////////////////
///////// ADMIN PANEL 
////////////////// 

// Catgs Controller 
Route::get('admin/catg/index','ADMIN\catgsController@index');
Route::post('admin/catg/store','ADMIN\catgsController@store');
Route::post('admin/catg/update/{id}','ADMIN\catgsController@update');
Route::get('admin/catg/destroy/{id}','ADMIN\catgsController@destroy');

// Trainers Controller 
Route::post('/admin/trainers/store','ADMIN\trainersController@store');
Route::get('/admin/trainers/index','ADMIN\trainersController@index');
Route::post('/admin/trainers/updateImage/{id}','ADMIN\trainersController@updateImage');
Route::post('/admin/trainers/update/{id}','ADMIN\trainersController@update');
Route::get('/admin/trainers/destroy/{id}','ADMIN\trainersController@destroy');
Route::get('/admin/trainers/destroyDegree/{id}','ADMIN\trainersController@destroyDegree');

// Course Controller
Route::post('/admin/course/store','ADMIN\courseController@store');
Route::get('/admin/course/index','ADMIN\courseController@index');
Route::get('/admin/course/show/{id}','ADMIN\courseController@show');
Route::post('admin/course/updateImage/{id}','ADMIN\courseController@updateImage');
Route::post('/admin/course/update/{id}','ADMIN\courseController@update');
Route::get('/admin/course/destroy/{id}','ADMIN\courseController@destroy');
Route::get('/admin/course/destroyReq/{id}','ADMIN\courseController@destroyReq');
Route::get('/admin/course/destroySection/{id}','ADMIN\courseController@destroySection');


// Pay Controller 
Route::get('/admin/pay/index','ADMIN\payController@index');
Route::get('/admin/pay/approve/{id}','ADMIN\payController@approve');

// frm Controller 
Route::get('/admin/frm/index','ADMIN\frmController@index');
Route::get('/admin/frm/approve/{id}','ADMIN\frmController@approve');


///////////////////////
////// Website
/////////////////// 

// main Controller 
Route::get('/catg/index','API\mainController@catgs');
Route::get('/courses/index/with_catg/{id}','API\mainController@courses_withcatg');
Route::get('/course/show/{id}','API\mainController@showCourse');

// User Controller 
Route::post('/user/store','API\userController@store');
Route::post('/user/login','API\userController@login');
Route::get('/user/user_auth','API\userController@user_auth');
Route::get('/user/logout','API\userController@logout');

// Catg Page
Route::get('/catg_page/index','API\mainController@catg_page');
Route::get('/catg_page/change_catg/index/{id}','API\mainController@change_catg');


// pay Controller 
Route::post('/pay/store/{id}','API\payController@store');

// frm controller 
Route::post('/frm/store','API\frmController@store');
