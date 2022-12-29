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

use App\Models\Unit;

Route::get('/', function () {
     return view('test');
});

Route::group(['prefix' => 'error'], function () {
     Route::get('404', function () {
          return view('pages.error.404');
     });
     Route::get('500', function () {
          return view('pages.error.500');
     });
});

Route::get('/clear-all', function () {
     Artisan::call('cache:clear');
     Artisan::call('route:clear');
     Artisan::call('config:clear');
     Artisan::call('view:clear');
     return "All is cleared";
});

// // 404 for undefined routes
// Route::any('/{page?}', function () {
//     return View::make('pages.error.404');
// })->where('page', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group([
     'prefix' => '',
], function () {
     Route::get('/users/getUserJson', 'UsersController@getUserJson')->name('user.getUserJson');

     #Route resource dibawah
     Route::resource('/users', UsersController::class);
});

Route::group([
     'prefix' => '',
], function () {
     Route::get('/units/getUnitJson', 'UnitsController@getUnitJson')->name('unit.getUnitJson');

     #Route resource dibawah
     Route::resource('/units', UnitsController::class);
});

Route::group([
     'prefix' => '',
], function () {
     Route::get('/positions/getPositionJson', 'PositionsController@getPositionJson')->name('position.getPositionJson');

     #Route resource dibawah
     Route::resource('/positions', PositionsController::class);
});

Route::group([
     'prefix' => '',
], function () {
     Route::get('/userDetails/getuserDetailJson', 'userDetailsController@getuserDetailJson')->name('userDetail.getuserDetailJson');

     #Route resource dibawah
     Route::resource('/userDetails', userDetailsController::class);
});

Route::group([
     'prefix' => '',
], function () {
     Route::get('/jobs/getJobJson', 'JobsController@getJobJson')->name('job.getJobJson');
     Route::get('/jobs/getJobDetailJson/{jobDetailsId}', 'JobsController@getJobDetailJson')->name('getJobDetailJson');

     #Route resource dibawah
     Route::resource('/jobs', JobsController::class);
});

Route::group([
     'prefix' => '',
], function () {
     Route::get('/jobDetails/getJobDetailJson', 'JobDetailsController@getJobDetailJson')->name('job.getJobDetailJson');

     #Route resource dibawah
     Route::resource('/jobDetails', JobDetailsController::class);
});

// Khusus Select2
Route::group([
     'prefix' => '',
], function () {
     Route::get('/getUnitLists', 'Select2Controller@getUnitLists')->name('getUnitLists');
     Route::get('/getUserLists', 'Select2Controller@getUserLists')->name('getUserLists');
     Route::get('/getPositionLists', 'Select2Controller@getPositionLists')->name('getPositionLists');
});
