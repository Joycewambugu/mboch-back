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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/passport', function ()
{
    return view('passport_components');
})->name('passport')->middleware('auth');


Route::resource('subscriptionPlans', 'SubscriptionPlanController');





Route::resource('jobSeekers', 'JobSeekerController');

Route::resource('employers', 'EmployerController');

Route::resource('jobSeekerExperiences', 'JobSeekerExperienceController');