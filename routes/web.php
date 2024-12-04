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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view("Student/HomePage");
});

Route::get('/contactUs', function () {
    return view("ContactUs");
});
Route::post('/store_Contact', 'ContactUsController@store');

Route::get('/login_system','UserController@Login_system');




/***********************Admin ******************** */

    /********************User *************** */
        Route::get('/create_User', 'UserController@create');
        Route::post('/store_user', 'UserController@store');

        Route::get('/show_all_users', 'UserController@index');
        Route::get('/user_show/{id}', 'UserController@show')->name('user.show');
        Route::get('/ShowAll_Course_User/{id}', 'UserController@ShowAll_Course_User')->name('user.ShowAll_Course_User');


        Route::get('/user_edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/user_update/{id}', 'UserController@update')->name('user.update');
        
        Route::get('/edit_user_password/{id}', 'UserController@edit_password')->name('user.edit_password');
        Route::put('/update_user_password/{id}', 'UserController@update_password')->name('user.update_password');

        Route::delete('/user_delete/{id}', 'UserController@destroy');

    /*************** Course *****************************************/
        Route::get('/show_all_Courses', 'CourseController@index');
    
        Route::get('/create_Course', 'CourseController@create');
        Route::post('/store_Course', 'CourseController@store');

        Route::get('/Course/{id}', 'CourseController@show')->name('Course.show');

        Route::get('/Course_edit/{id}', 'CourseController@edit')->name('Course.edit');

        Route::put('/Course/{id}', 'CourseController@update')->name('Course.update');

        Route::delete('/Course/{id}', 'CourseController@destroy');
    /*************** Session *****************************************/
        Route::get('/Show_sessions_Admin', 'SessionController@index_Admin');

        Route::get('/Session_Admin/{id}', 'SessionController@show_Admin')->name('Session.show_Admin');
        Route::delete('/Session_Admin/{id}', 'CourseController@destroy_Admin');

    /********************* Course Details ********************* */
        Route::get('/Course_student_show/{id}', 'CourseController@Course_student_show')->name('Course_student.Course_student_show');
        Route::get('/Course_teacher_show/{id}', 'CourseController@Course_teacher_show')->name('Course_teacher.Course_teacher_show');
        Route::get('/Course_session_showAll/{id}', 'CourseController@Course_session_showAll')->name('Course_session.Course_session_showAll');

        Route::get('/Course_Session/{id}', 'CourseController@Course_session_show')->name('Course_Session.show');


    /******************Assign courses ******************* */
        Route::get('/assign_Course_teacher', 'CourseController@assign_Course_teacher');
        Route::post('/store_Course_teacher', 'CourseController@storen_Course_teacher');

        Route::get('/assign_Course_student', 'CourseController@assign_Course_student');
        Route::post('/store_Course_student', 'CourseController@store_Course_student');

        Route::get('/show_all_assign_Course_teacher', 'CourseController@index_Course_teacher');
        Route::get('/show_all_assign_Course_student', 'CourseController@index_Course_student');

        Route::get('/Course_Assigned_teacher_edit/{id}', 'CourseController@Course_Assigned_teacher_edit')->name('Course_Assigned_teacher.edit');

        Route::delete('/student_course_delete/{id}', 'CourseController@student_course_delete');

     /***************   Contact us *****************************************/
    Route::get('/Show_All_ContactUs', 'ContactUsController@index');
    Route::get('/Show_unreaded_ContactUs', 'ContactUsController@index_unreaded');

    Route::get('/Contact/{id}', 'ContactUsController@show')->name('Contact.show');
    Route::get('/Contact_unreaded/{id}', 'ContactUsController@show_unreaded')->name('Contact.show_unreaded');
    Route::delete('/Contact/{id}', 'ContactUsController@destroy');


/**********************Teacher *************************** */
    /*************** Session *****************************************/
    //Route::get('/show_all_Sessions', 'SessionController@index');
    Route::post('/Select_Course', 'SessionController@index');
 
    Route::get('/create_Session/{id}', 'SessionController@create')->name('Session.create');
    Route::post('/store_Session', 'SessionController@store');

    Route::get('Sessions/{uuid}/download', 'SessionController@download')->name('Session.download');

    Route::get('/Session/{id}', 'SessionController@show')->name('Session.show');

    Route::get('/Session_edit/{id}', 'SessionController@edit')->name('Session.edit');

    Route::put('/Session/{id}', 'SessionController@update')->name('Session.update');

    Route::delete('/Session/{id}', 'SessionController@destroy');

/********************** Student *************************** */
    /*************** Session *****************************************/
    Route::post('/Select_Course_Student', 'SessionController@index_Student');

    Route::get('/Session_Student/{id}', 'SessionController@show_Student')->name('Session.show_Student');


/******************** Profile *************** */
    
    Route::get('/user_show_profile/{id}', 'UserController@show_profile')->name('user.show_profile');

    Route::get('/user_edit_profile/{id}', 'UserController@edit_profile')->name('user.edit_profile');
    Route::put('/user_update_profile/{id}', 'UserController@update_profile')->name('user.update_profile');
    
    Route::get('/edit_user_password_profile/{id}', 'UserController@edit_password_profile')->name('user.edit_password_profile');
    Route::put('/update_user_password_profile/{id}', 'UserController@update_password_profile')->name('user.update_password_profile');




    



