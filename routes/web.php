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
Route::get('/timestamp', function () {
    $timestamp = Carbon\Carbon::parse(date('y-m-d, h:i:s'))->translatedFormat('d F Y, h:i:s');
    return $timestamp;
})->name('timestamp');

Route::get('/lowongan', 'GuestController@lowongan');
Route::get('/detail-lowongan/{uuid}', 'GuestController@detailLowongan');

Route::get('/announcement', 'GuestController@pengumuman');

/** ======================================================================== [Start Route] Role : Administrator */

/** ======================================================================== [End Route] Role : Administrator */

/** ======================================================================== [Start Route] Role : SDM */
Route::group([ #sdm|
    'middleware' => ['role:sdm', 'auth',],
], function () {
    Route::get('/sdm', function () {
        return view('sdm.dashboard');
    })->name('sdm');

    Route::get('/administration', 'SdmController@index');

    Route::put('administration/status/{uuid}', 'SdmController@statusUpdate')->name('admin.statusUpdate');

    Route::get('/administration/getAdministrationJson/{uuid}', 'SdmController@getAdministrationJson');

    // Phase2
    Route::get('/phase2', 'SdmController@getPhase2Json');
    Route::get('/getPhase2Json/{uuid}', 'SdmController@getPhase2Json');
    Route::put('/getPhase2Json/status/{uuid}', 'SdmController@statusPhase2');

    // Phase3
    Route::get('/phase3', 'SdmController@getPhase3Json');
    Route::get('/getPhase3Json/{uuid}', 'SdmController@getPhase3Json');
    Route::put('/getPhase3Json/status/{uuid}', 'SdmController@statusPhase3');

    // Phase4
    Route::get('/phase4', 'SdmController@getPhase4Json');
    Route::get('/getPhase4Json/{uuid}', 'SdmController@getPhase4Json');
    Route::put('/getPhase4Json/status/{uuid}', 'SdmController@statusPhase4');

    // Phase5
    Route::get('/phase5', 'SdmController@getPhase5Json');
    Route::get('/getPhase5Json/{uuid}', 'SdmController@getPhase5Json');
    Route::put('/getPhase5Json/status/{uuid}', 'SdmController@statusPhase5');

    // Phase5
    Route::get('/phase5', 'SdmController@getPhase5Json');
    Route::get('/getPhase5Json/{uuid}', 'SdmController@getPhase5Json');
    Route::put('/getPhase5Json/status/{uuid}', 'SdmController@statusPhase5');

    // Phase6
    Route::get('/phase6', 'SdmController@getPhase6Json');
    Route::get('/getPhase6Json/{uuid}', 'SdmController@getPhase6Json');
    Route::put('/getPhase6Json/status/{uuid}', 'SdmController@statusPhase6');

    // Phase7
    Route::get('/phase7', 'SdmController@getPhase7Json');
    Route::get('/getPhase7Json/{uuid}', 'SdmController@getPhase7Json');
    Route::put('/getPhase7Json/status/{uuid}', 'SdmController@statusPhase7');

    // Phase8
    Route::get('/phase8', 'SdmController@getPhase8Json');
    Route::get('/getPhase8Json/{uuid}', 'SdmController@getPhase8Json');
    Route::put('/getPhase8Json/status/{uuid}', 'SdmController@statusPhase8');

    // Phase9
    Route::get('/phase9', 'SdmController@getPhase9Json');
    Route::get('/getPhase9Json/{uuid}', 'SdmController@getPhase9Json');
    Route::put('/getPhase9Json/status/{uuid}', 'SdmController@statusPhase9');
});
/** ======================================================================== [End Route] Role : SDM */


/** ======================================================================== [Start Route] Role : Administrator|SDM */
Route::group([
    'middleware' => [
        'role:administrator|sdm|karu', 'auth',
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
        'role:administrator|sdm', 'auth',
    ],
], function () {
    Route::get('/units/getUnitJson', 'UnitsController@getUnitJson')->name('unit.getUnitJson');
    Route::get('/positions/getPositionJson/{uuid}', 'UnitsController@getPositionJson')->name('unit.getPositionJson');

    #Route resource dibawah
    Route::resource('/units', UnitsController::class);
});

Route::group([
    'middleware' => [
        'role:administrator|sdm', 'auth',
    ],
], function () {
    Route::get('/positions/getPositionJson', 'PositionsController@getPositionJson')->name('position.getPositionJson');

    #Route resource dibawah
    Route::resource('/positions', PositionsController::class);
});

Route::group([
    'middleware' => [
        'role:administrator|sdm', 'auth',
    ],
], function () {
    Route::get('/jobs/getJobJson', 'JobsController@getJobJson')->name('job.getJobJson');
    Route::get('/jobs/getJobDetailJson/{jobDetailsId}', 'JobsController@getJobDetailJson')->name('job.getJobDetailJson');

    #Route resource dibawah
    Route::resource('/jobs', JobsController::class);
});

Route::group([
    'middleware' => [
        'role:administrator|sdm', 'auth',
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

Route::group([
    'prefix' => '',
], function () {
    Route::get('/applications/getApplicationJson', 'ApplicationsController@getApplicationJson')->name('ApplicationJson');

    #Route resource dibawah
    Route::resource('/applications', ApplicationsController::class);
});
/** ======================================================================== [End Route] Role : Administrator|SDM */


/** ======================================================================== [Start Route] Role : Karu */
Route::group([ #karu|
    'middleware' => ['role:karu', 'auth',],
], function () {
    Route::get('/karu', function () {
        return view('karu.dashboard');
    })->name('karu');
    Route::get('/input-nilai', 'KaruController@index')->name('karu.index');

    Route::get('/karu/getJobJson', 'KaruController@getJobJson')->name('job.getJobJson');

    Route::post('/input-nilai', 'KaruController@postInputNilai')->name('post.inputNilai');
    Route::post('/store-nilai', 'KaruController@storeNilai')->name('store.nilai');
    Route::post('/jsonInputNilai', 'KaruController@jsonInputNilai')->name('jsonInputNilai');

    Route::get('/input-nilai/{phase}/{uuid}', 'KaruController@getInputNilai')->name('get.inputNilai');

    Route::get('/input-nilai/getNilaiJson', 'KaruController@getNilaiJson')->name('peserta.getNilaiJson');

    Route::get('/getPesertaNilaiJson/{phase}/{uuid}', 'KaruController@getPesertaNilaiJson')->name('peserta.NilaiJson');

    // User
    Route::get('/karu/getUserJson', 'KaruController@getUserJson')->name('karu.getUserJson');
    #Route resource dibawah
    Route::get('/show-users/{uuid}', 'KaruController@showUser')->name('karu.user.show');
    Route::get('/index-users', 'KaruController@indexUser')->name('karu.user.index');
});
/** ======================================================================== [End Route] Role : Karu */

/** ======================================================================== [Start Route] Role : HRD */
Route::group([ #HRD|
    'middleware' => ['role:hrd', 'auth',],
], function () {
    Route::get('/hrd', function () {
        return view('hrd.dashboard');
    })->name('hrd');
});
/** ======================================================================== [End Route] Role : HRD */

/** ======================================================================== [Start Route] Role : Peserta */
Route::group([ #peserta|
    'middleware' => ['role:peserta', 'auth',],
], function () {
    Route::get('/dashboard', function () {
        return view('peserta.dashboard');
    })->name('peserta');


    Route::get('/hasil-seleksi', 'PesertaController@hasilSeleksi')->name('hasilSeleksi');
    Route::get('/detail-seleksi/{uuid}', 'PesertaController@detailSeleksi')->name('hasilSeleksi.detail');
    Route::get('/hasil-seleksi/getApplicationJson', 'PesertaController@getApplicationJson')->name('peserta.getApplicationJson');

    Route::get('/list-lowongan', 'PesertaController@jobList');
    Route::get('/lowongan-detail/{uuid}', 'PesertaController@lowonganDetail')->name('lowongan.detail');
    Route::get('/jadwal-seleksi', 'PesertaController@jadwalSeleksi')->name('jadwal.seleksi');

    Route::post('/kirim-lamaran', 'PesertaController@kirimLamaran')->name('kirim.lamaran');
});
/** ======================================================================== [End Route] Role : Peserta */

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

// Khusus Select2
Route::group([
    'middleware' => [
        'auth',
    ],
], function () {
    Route::get('/getUnitLists', 'Select2Controller@getUnitLists')->name('getUnitLists');
    Route::get('/getUserLists', 'Select2Controller@getUserLists')->name('getUserLists');
    Route::get('/getPositionLists', 'Select2Controller@getPositionLists')->name('getPositionLists');
});

Route::get('/reload-captcha', 'UserRegisterController@reloadCaptcha');

Route::group([
    'prefix' => '',
], function () {
    Route::get('/announcements/getAnnouncementJson', 'AnnouncementsController@getAnnouncementJson')->name('announcementJson');

    #Route resource dibawah
    Route::resource('/announcements', AnnouncementsController::class);
});

Route::group([
    'prefix' => 'reports',
], function () {
    route::get('/', 'ReportController@index');

    route::post('/peserta', 'ReportController@exportPeserta')->name('export.peserta');
    route::post('/unit', 'ReportController@exportUnit')->name('export.unit');
});

Route::group([
    'prefix' => '',
], function () {
    Route::get('/guideJson', 'GuidesController@getGuideJson')->name('guideJson');

    #Route resource dibawah
    Route::resource('/guides', AnnouncementsController::class);
});
