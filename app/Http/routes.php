<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* This Route to searhc records for testing purpose */
Route::get('/test', 'TestController@testsearch');

Route::get('/sum', 'TestController@sum' );

Route::get('/registration', function(){
    return view('StudentRegistration');
});
Route::post('/AddNewStudent','StudentController@StudentRegistration');

/* These Routes are used for update student records */
Route::get('update', 'StudentController@GetEditStudentDetails');
    
Route::post('/postupdate', 'StudentController@StudentUpdate');

/* This Route is used for show student Details */
Route::get('/getstudentdetails', 'StudentController@GetStudentDetails');

/* This Route is used for Delete Student Records */
Route::get('/deleteStudentRecords', 'StudentController@DeleteStudentRecords');

/* These Routes are used for search Records */
Route::get('/search', function(){
    return view('SearchStudentRecord');
});
Route::post('/postsearch', 'StudentController@SearchStudentRecord' );

Route::get('/studentdetails', function(){
    return view('StudentDetails');
});

/*Rout for All Student Information */
Route::get('allstudent', function(){
    return view('AllStudentInfo');
});
Route::post('/getStudentListAjax', 'StudentController@AllStudentInfo');

/* This Route is used for search student records using search field in list page */
Route::get('/SearchStudentList', 'StudentController@SearchStudentList');

/* Thes Routes are used for User Registration and Authentication */
/* This Route is used for View Laravel Home Page*/
Route::get('/', function () {
    return view('welcome');
});

/* This Route is used for Load User Registration Form view */
Route::get('/GetUserRegistration', function(){
    return view('GetUserRegistration');
});

/* This Route is used for create new user registration */
Route::post('register', 'LoginController@NewUserRegistration');

/* These Routes are working for Login */
Route::get('/login', function(){
    return view('GetLoginPage');
});

Route::post('/login', 'LoginController@UserLogin');

/*This Route is use just after user login */
Route::get('/homepage', function() {
     return view('HomePage');
});

/* This Route is used for Logut Button and rederect to Login Page */
Route::get('/logout', function(){
    //session_destroy();
    return view('GetLoginPage');
});

/* This Route is used for set User Password after click on email link */
Route::get('/setpassword',function(){
    return view('SetPassword');
});
Route::post('/setpassword', 'LoginController@SetPassword');



