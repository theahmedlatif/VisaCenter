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


//Home Page routing issue
Route::group(['middleware'=>'auth'], function(){

    Route::get('/','HomeController@index')->name('home');
    Route::get('home','HomeController@index')->middleware('admin');



    Route::get('/dummy', function () {
        return view('admin.dummy_disclaimer');
    })->name('dummy')->middleware('dummyRole');

    Route::group(['middleware'=>'admin'], function(){
        Route::get('/admin/panel/users','UserController@index')->name('admin.panel.users'); // index all system users
        Route::get('/admin/panel/user/edit/{id}','UserController@edit')->name('admin.panel.user.edit');// view user to be edited
        Route::put('/admin/panel/user/update/{id}','AdminController@modifyUserRole')->name('admin.panel.user.update');// update user role
        //Route::get('/admin/panel/user/{id}','UserController@show')->name('admin.panel.user'); // user view his profile return array
    });

    Route::group(['middleware'=>'frontOffice'], function(){
        Route::get('/staff/passport','PassportController@create')->name('staff.passport'); // create new passport
        Route::post('/staff/passport/store','PassportController@store')->name('staff.passport.store'); // store created passport
    });

    Route::group(['middleware'=>'approvalCenter'], function(){
        Route::get('/staff/passport/edit/{id}','PassportController@edit')->name('staff.passport.edit'); // handle passport
        Route::put('/staff/passport/update/{id}','PassportController@update')->name('staff.passport.update'); //update passport edits
        Route::get('/staff/passports/workspace','PassportController@myPassports')->name('staff.passports.workspace'); // index assigned passports to logged in user
        Route::get('/staff/passports/myHistory','PassportController@myHandledPassports')->name('staff.passports.myHistory'); // index assigned passports to logged in user
    });

    Route::group(['middleware'=>'dispatcher'], function(){
        Route::get('/staff/passport/assign/{id}','PassportController@assignPassport')->name('staff.passport.assign'); // assign passport
        Route::put('/staff/passport/dispatch/{id}','PassportController@assignPassportUpdate')->name('staff.passport.dispatch'); //dispatch assigned passport
        Route::get('/reports/dashboard','ReportController@dashboard')->name('reports.dashboard'); // dashboard for passports distribution on statuses
    });

    Route::get('/staff/passports/query','PassportController@passportsQueryInput')->name('staff.passports.query'); // query based on multiple inputs
    Route::get('/staff/passports/query/results','PassportController@passportsQueryOutput')->name('staff.passports.query.results'); //display query result
    Route::get('/staff/passport/show/{id}','PassportController@show')->name('staff.passport.show'); // show passport
});




