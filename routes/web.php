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
Auth::routes(['register' => false]);

Route::post('/register', 'UserRegisterController@create')->name('post.register');
Route::get('/register', 'UserRegisterController@index')->name('register');

Route::get('/', function () {
     return view('index');
});

Route::get('/lowongan', 'GuestController@lowongan');
Route::get('/detail-lowongan/{uuid}', 'GuestController@detailLowongan');

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
     Artisan::call('event:clear');
     Artisan::call('optimize:clear');
     return "All is cleared";
});

// // 404 for undefined routes
// Route::any('/{page?}', function () {
//     return View::make('pages.error.404');
// })->where('page', '.*');

/**
 * Check Role For Redirect
 */
Route::get('/home', function () {
     return CheckRole();
})->name('home')->middleware(['auth']);

Route::group([ #admin|
     'middleware' => ['role:administrator', 'auth',],
], function () {
     Route::get('/admin', 'AdminController@dashboard')->name('admin');
});

Route::group([ #sdm|
     'middleware' => ['role:sdm', 'auth',],
], function () {
     Route::get('/sdm', function () {
          return view('sdm.dashboard');
     })->name('sdm');

     Route::get('/administration', 'SdmController@index');

     Route::put('administration/status/{uuid}', 'SdmController@statusUpdate')->name('admin.statusUpdate');

     Route::get('/administration/getAdministrationJson/{uuid}', 'SdmController@getAdministrationJson');
     // Route::get('/administration/getAdmParticipantJson/{uuid}', 'SdmController@getAdmParticipantJson');

});

Route::group([ #karu|
     'middleware' => ['role:karu', 'auth',],
], function () {
     Route::get('/karu', function () {
          return view('karu.dashboard');
     })->name('karu');
});

Route::group([ #peserta|
     'middleware' => ['role:peserta', 'auth',],
], function () {
     Route::get('/dashboard', function () {
          return view('peserta.dashboard');
     })->name('peserta');

     Route::get('/list-lowongan', 'PesertaController@jobList');
     Route::get('/lowongan-detail/{uuid}', 'PesertaController@lowonganDetail')->name('lowongan.detail');
     Route::get('/jadwal-seleksi', 'PesertaController@jadwalSeleksi')->name('jadwal.seleksi');

     Route::post('/kirim-lamaran', 'PesertaController@kirimLamaran')->name('kirim.lamaran');
});

Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/users/getUserJson', 'UsersController@getUserJson')->name('user.getUserJson');

     #Route resource dibawah
     Route::resource('/users', UsersController::class);
});

Route::group([
     'prefix' => '/userDetails',
     'middleware' => [
          'auth',
     ],
], function () {
     Route::get('/getUserDetailJson', 'userDetailsController@getuserDetailJson')->name('userDetail.getuserDetailJson');

     #Route resource dibawah
     // Route::resource('/userDetails', UserDetailsController::class);

     Route::group(['middleware' => ['role:administrator|peserta|karu|hrd|direktur|sdm']], function () {
          Route::get('/show/{user}', 'UserDetailsController@show')
               ->name('userDetails.show');
          Route::get('/{user}/edit', 'UserDetailsController@edit')
               ->name('userDetails.edit');

          Route::put('user/{user}', 'UserDetailsController@update')
               ->name('userDetails.update');
     });

     Route::group(['middleware' => ['role:administrator|sdm']], function () {
          Route::post('/', 'UserDetailsController@store')
               ->name('userDetails.store');
          Route::get('/', 'UserDetailsController@index')
               ->name('userDetails.index');
          Route::get('/create', 'UserDetailsController@create')
               ->name('userDetails.create');
          Route::delete('/user/{user}', 'UserDetailsController@destroy')
               ->name('userDetails.destroy');
     });
});

Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/units/getUnitJson', 'UnitsController@getUnitJson')->name('unit.getUnitJson');
     Route::get('/positions/getPositionJson/{uuid}', 'UnitsController@getPositionJson')->name('unit.getPositionJson');

     #Route resource dibawah
     Route::resource('/units', UnitsController::class);
});

Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/positions/getPositionJson', 'PositionsController@getPositionJson')->name('position.getPositionJson');

     #Route resource dibawah
     Route::resource('/positions', PositionsController::class);
});

Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/jobs/getJobJson', 'JobsController@getJobJson')->name('job.getJobJson');
     Route::get('/jobs/getJobDetailJson/{jobDetailsId}', 'JobsController@getJobDetailJson')->name('job.getJobDetailJson');

     #Route resource dibawah
     Route::resource('/jobs', JobsController::class);
});

Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/jobDetails/getJobDetailJson', 'JobDetailsController@getJobDetailJson')->name('job.getJobDetailJson');

     #Route resource dibawah
     Route::resource('/jobDetails', JobDetailsController::class);
});

Route::group([
     'middleware' => [
          'role:administrator|sdm',
          'auth',
     ],
], function () {
     Route::get('/schedules/getScheduleJson', 'SchedulesController@getScheduleJson')->name('scheduleJson');

     #Route resource dibawah
     Route::resource('/schedules', SchedulesController::class);
});

// Khusus Select2
Route::group([
     'middleware' => [
          'role:administrator', 'auth',
     ],
], function () {
     Route::get('/getUnitLists', 'Select2Controller@getUnitLists')->name('getUnitLists');
     Route::get('/getUserLists', 'Select2Controller@getUserLists')->name('getUserLists');
     Route::get('/getPositionLists', 'Select2Controller@getPositionLists')->name('getPositionLists');
});

Route::get('/reload-captcha', 'UserRegisterController@reloadCaptcha');

Route::group([
     'prefix' => 'applications',
], function () {
     Route::get('/', 'ApplicationsController@index')
          ->name('applications.index');
     Route::get('/create', 'ApplicationsController@create')
          ->name('applications.create');
     Route::get('/show/{application}', 'ApplicationsController@show')
          ->name('applications.show')->where('id', '[0-9]+');
     Route::get('/{application}/edit', 'ApplicationsController@edit')
          ->name('applications.edit')->where('id', '[0-9]+');
     Route::post('/', 'ApplicationsController@store')
          ->name('applications.store');
     Route::put('/{application}', 'ApplicationsController@update')
          ->name('applications.update')->where('id', '[0-9]+');
     Route::delete('/{application}', 'ApplicationsController@destroy')
          ->name('applications.destroy')->where('id', '[0-9]+');

     Route::get('/getApplicationJson', 'ApplicationsController@getApplicationJson')->name('ApplicationJson');
});
