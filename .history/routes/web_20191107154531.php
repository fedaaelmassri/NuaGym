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

/* .... Start Front end ...*/
Route::get('/home', function () {
    return view('frontend.home');
})->name('home');

Route::get('/home-2', 'frontend\ProgramsController@index')->name('home-2');



Route::get('/home-8', function () {
    return view('frontend.home-8');
})->name('home-8');


Route::get('/sessions', function () {
    return view('frontend.sessions');
})->name('sessions');

Route::get('/programs', function () {
    return view('frontend.programs');
})->name('programs');

Route::get('/events', function () {
    return view('frontend.events');
})->name('events');


Route::get('/aboutus', function () {
    return view('frontend.aboutus');
})->name('aboutus');

Route::get('/admin', function () {
    return view('backend.layouts.admin');
})->name('admin');

Auth::routes();
Route::get('/dashbaord', function () {
    return view('backend.layouts.admin');
})->name('dashbaord');

Route::get('/home', function () {
    return view('frontend.home');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



/** Start Member Auth **/
Route::get('/member/login', 'AuthMember\MemberLoginController@showLoginForm')->name('member.login');
Route::post('/member/post-login', 'AuthMember\MemberLoginController@postLogin')->name('member.post-login');
Route::get('/member/registration', 'AuthMember\MemberRegisterController@showRegisterForm')->name('member.registration');
Route::post('/member/post-registration', 'AuthMember\MemberRegisterController@postRegistration')->name('member.post-registration');
// Route::get('/member/dashboard', 'AuthMember@dashboard')->name('memberdashboard');
Route::get('/member/logout', 'AuthMember\MemberLoginController@logout')->name('member.logout');


/** End Member auth**/
/*
 _  member profile routes
 */
// Route::group(['middleware'=>'member'], function() {
//     Route::get('/member/dashbaord', 'forntend\members\HomeController@index')->name('memberdashboard');
// });

Route::get('/member/dashboard', function () {
    return view('frontend.layouts.admin');
})->name('memberdashboard');


//// Start Coaches route ////

Route::get('/coaches',  'frontend\CoachesController@index')->name('coaches');
Route::get('/home-7/{p_id}',  'frontend\CoachesController@coatchesForProgram')->name('home-7');

//// End Coaches route ////

//// Start  member Program  route ////

Route::namespace('frontend')->prefix('/member/programs')->middleware(['members'])->group(function (){
    Route::get('/', 'frontend\ProgramsController@index')->name('member.Program');
    Route::get('/payPrograms/{id}',  'frontend\ProgramsController@payPrograms')->name('payPrograms');

    // Route::get('/create','ProgramController@create')->name('admin.Program.create');
    // Route::post('/store','ProgramController@store')->name('admin.Program.store');
    // Route::get('/delete/{id}', 'ProgramController@delete')->name('admin.Program.delete');
    // Route::get('/edit/{id}', 'ProgramController@editprogram')->name('admin.Program.edit');
    // Route::put('{id}', 'ProgramController@updateprogram')->name('admin.Program.update');

});

////end  member Program route ////



/* .... end Front end ...*/

/* .... route Programs ....  */
Route::namespace('backend')->prefix('/admin/programs')->middleware(['auth'])->group(function (){
    Route::get('/', 'ProgramController@index')->name('admin.Program');
    Route::get('/create','ProgramController@create')->name('admin.Program.create');
    Route::post('/store','ProgramController@store')->name('admin.Program.store');
    Route::get('/delete/{id}', 'ProgramController@delete')->name('admin.Program.delete');
    Route::get('/checkfoundcoach/{p_id}', 'ProgramController@checkfoundcoach')->name('admin.Program.checkfoundcoach');
    Route::post('/addcoach/{p_id}/{c_id}','ProgramController@AddCoach')->name('admin.Program.addcoach');
    Route::get('/deletecoach/{p_id}/{c_id}', 'ProgramController@RemoveCoach')->name('admin.Program.removecoach');
    Route::get('/getallcoach', 'ProgramController@getallcoach')->name('admin.Program.getallcoach');
    Route::get('/edit/{id}', 'ProgramController@editprogram')->name('admin.Program.edit');
    Route::put('{id}', 'ProgramController@updateprogram')->name('admin.Program.update');

});
/* .... end Programs route .... */


/* .... route Coaches ....  */
Route::namespace('backend')->prefix('/admin/coaches')->middleware(['auth'])->group(function (){
    Route::get('/', 'CoacheController@index')->name('admin.Coache');
    Route::get('/create','CoacheController@create')->name('admin.Coache.create');
    Route::post('/store','CoacheController@store')->name('admin.Coache.store');
    Route::get('/delete/{id}', 'CoacheController@delete')->name('admin.Coache.delete');
    Route::get('/edit/{id}', 'CoacheController@editcoache')->name('admin.Coache.edit');
    Route::put('{id}', 'CoacheController@updatecoache')->name('admin.Coache.update');

});
/* .... end Coaches route .... */

/* .... route userprofile ....  */
Route::namespace('backend')->prefix('/admin/userprofile')->middleware(['auth'])->group(function (){
      Route::get('/', 'UserprofileController@edit')->name('admin.userprofile.edit');
    Route::put('{id}', 'UserprofileController@update')->name('admin.userprofile.update');

});
/* .... end userprofile route .... */


/* .... route Members ....  */
Route::namespace('backend')->prefix('/admin/members')->middleware(['auth'])->group(function (){
    Route::get('/', 'MemberController@index')->name('admin.Member');
    Route::get('/Activate/{id}', 'MemberController@Activate')->name('admin.Member.Activate');

    // Route::get('/create','ProgramController@create')->name('admin.Member.create');
    // Route::post('/store','ProgramController@store')->name('admin.Member.store');
    // // Route::get('/delete/{id}', 'ProgramController@delete')->name('admin.Program.delete');
    // Route::get('/edit/{id}', 'ProgramController@editprogram')->name('admin.Member.edit');
    // Route::put('{id}', 'ProgramController@updateprogram')->name('admin.Member.update');

});
/* .... end Members route .... */


