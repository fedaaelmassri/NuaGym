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

Route::get('/home-2/{cid?}', 'frontend\ProgramsController@index')->name('home-2');
Route::get('/programs', 'frontend\ProgramsController@allprograms')->name('programs');
Route::get('/events', 'frontend\EventsController@index')->name('events');
Route::get('/subscripeEvent/{eventid}',  'frontend\EventsController@subscripeEvent')->name('subscripeEvent');




Route::get('/sessions', function () {
    return view('frontend.sessions');
})->name('sessions');

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
Route::get('/payment', 'frontend\PaymentController@makePyment')->name('payment');



/** Start Member Auth **/
Route::get('/member/login', 'AuthMember\MemberLoginController@showLoginForm')->name('member.login');
Route::post('/member/post-login', 'AuthMember\MemberLoginController@postLogin')->name('member.post-login');
Route::get('/member/registration', 'AuthMember\MemberRegisterController@showRegisterForm')->name('member.registration');
Route::post('/member/post-registration', 'AuthMember\MemberRegisterController@postRegistration')->name('member.post-registration');
Route::get('/member/successregister', 'AuthMember\MemberRegisterController@successregister')->name('successregister');
Route::get('/member/logout', 'AuthMember\MemberLoginController@logout')->name('member.logout');


/** End Member auth**/
/*
 _  member profile routes
 */
// Route::group(['middleware'=>'member'], function() {
//     Route::get('/member/dashbaord', 'forntend\members\HomeController@index')->name('memberdashboard');
// });
/**  Start Member Dashboard */

    //  Route::get('member/dashboard',  'frontend\ProgramsController@programsformember')->name('memberdashboard');
    //  Route::get('member/events',  'frontend\EventsController@eventsformember')->name('memberevent');


     Route::namespace('frontend')->prefix('/member')->middleware(['member'])->group(function (){
        Route::get('/profile', 'MemberprofileController@edit')->name('member.memberprofile.edit');
        Route::get('/dashboard',  'ProgramsController@programsformember')->name('memberdashboard');
        Route::get('/events',  'EventsController@eventsformember')->name('memberevent');
     Route::put('{id}', 'MemberprofileController@update')->name('member.memberprofile.update');

  });


/**  End Member Dashboard */


//// Start Coaches route ////

Route::get('/coaches',  'frontend\CoachesController@index')->name('coaches');
Route::get('/home-7/{p_id}',  'frontend\CoachesController@coatchesForProgram')->name('home-7');
Route::get('/gitspicificraw',  'frontend\ProgramsController@gitspicificraw')->name('gitspicificraw');
Route::get('/home-8/{p_id}/{c_id}', 'frontend\ProgramsController@gitspicificraw')->name('home-8');
Route::get('/payPrograms/{pid}/{cid}',  'frontend\ProgramsController@payPrograms')->name('payPrograms');


//// End Coaches route ////

//// Start  member Program  route ////
Route::namespace('frontend')->prefix('/member/programs')->middleware(['members'])->group(function (){
    Route::get('/', 'frontend\ProgramsController@index')->name('member.Program');


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

/* .... route Events ....  */
Route::namespace('backend')->prefix('/admin/events')->middleware(['auth'])->group(function (){
    Route::get('/', 'EventController@index')->name('admin.Event');
    Route::get('/create','EventController@create')->name('admin.Event.create');
    Route::post('/store','EventController@store')->name('admin.Event.store');
    Route::get('/delete/{id}', 'EventController@delete')->name('admin.Event.delete');
    // Route::get('/checkfoundcoach/{p_id}', 'ProgramController@checkfoundcoach')->name('admin.Event.checkfoundcoach');
     // Route::get('/deletecoach/{p_id}/{c_id}', 'ProgramController@RemoveCoach')->name('admin.Program.removecoach');
    // Route::get('/getallcoach', 'ProgramController@getallcoach')->name('admin.Program.getallcoach');
    Route::get('/edit/{id}', 'EventController@editevent')->name('admin.Event.edit');
    Route::put('{id}', 'EventController@updateEvent')->name('admin.Event.update');

});
/* .... end Events route .... */


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


