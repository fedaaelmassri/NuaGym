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
    return view('frontend.index');
})->name('home');
 
Route::get('/table', function () {
    return view('frontend.table');
})->name('table');
 



Route::post('/lang' , 'frontend\LangController@index')->middleware('lang')->name('langGange');
Route::get('/change/en' , 'frontend\LangController@changeToEn')->middleware('lang')->name('langGange');
Route::get('/change/ar' , 'frontend\LangController@changeToAr')->middleware('lang')->name('langGange');



Route::get('/home-2/{cid?}', 'frontend\ProgramsController@index')->name('home-2');
Route::get('/programs', 'frontend\ProgramsController@allprograms')->name('programs');
Route::get('/classes', 'frontend\EventsController@index')->name('events');
Route::get('/events', 'frontend\EventsportController@index')->name('eventsport');
Route::get('/eventDetails/{e_id}', 'frontend\EventsportController@viewById')->name('eventsportDetails');
Route::get('/classDetails/{e_id}', 'frontend\EventsController@viewById')->name('eventDetails');
Route::get('/eventInWeek', 'frontend\EventsController@eventInWeek')->name('eventInWeek');
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


Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
Route::get('/payment/{payable_id}/{type}/{c_id?}', 'frontend\PaymentController@makePyment')->name('payment');

Route::get('/callback', 'frontend\PaymentController@callBack')->name('callBack');


/** Start Member Auth **/
Route::get('/member/login', 'AuthMember\MemberLoginController@showLoginForm')->name('member.login');
Route::post('/member/post-login', 'AuthMember\MemberLoginController@postLogin')->name('member.post-login');
Route::get('/member/registration', 'AuthMember\MemberRegisterController@showRegisterForm')->name('member.registration');
Route::post('/member/post-registration', 'AuthMember\MemberRegisterController@postRegistration')->name('member.post-registration');
Route::get('/successregister', 'AuthMember\MemberRegisterController@successregister')->name('successregister');
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
        Route::get('/paymentMethod',  'MemberprofileController@paymentMethod')->name('paymentMethod');
        Route::get('/transactions',  'MemberprofileController@memberTransaction')->name('transactions');
        Route::get('/classes',  'EventsController@eventsformember')->name('memberclass');
        Route::get('/events',  'EventsportController@eventsformember')->name('memberevent');
     Route::put('{id}', 'MemberprofileController@update')->name('member.memberprofile.update');


  });


/**  End Member Dashboard */


//// Start Coaches route ////

Route::get('/coaches',  'frontend\CoachesController@index')->name('coaches');
Route::get('/home-7/{p_id}',  'frontend\CoachesController@coatchesForProgram')->name('home-7');
Route::get('/coachesforclass/{e_id}',  'frontend\CoachesController@coachesForclass')->name('coachesforclass');
Route::get('/gitspicificraw',  'frontend\ProgramsController@gitspicificraw')->name('gitspicificraw');
Route::get('/home-8', 'frontend\ProgramsController@gitspicificraw')->name('home-8');
Route::get('/payPrograms/{pid}/{cid}',  'frontend\ProgramsController@payPrograms')->name('payPrograms');
Route::get('/programDetails', 'frontend\ProgramsController@viewById')->name('programDetails');
Route::get('/coachesDetails',  'frontend\CoachesController@viewById')->name('coachesDetails');


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
// Route::get('/dashbaord', function () {
//     return view('backend.index');
// })->name('dashbaord');
// Route::get('/dashbaord', 'backend\UserprofileController@index')->middleware(['auth']);

Route::namespace('backend')->prefix('admin/dashboard')->middleware(['auth'])->group(function (){
    Route::get('/', 'UserprofileController@index')->name('admin.dashboard');

    

    // return view('backend.layouts.admin')->name('dashboard');
});
/* .... route Settings ....  */
Route::namespace('backend')->prefix('/admin/setting')->middleware(['auth'])->group(function (){
    Route::get('/', 'SettingController@index')->name('admin.settings');
    Route::put('update','SettingController@update')->name('admin.setting.update');




});
/* .... end Settings route .... */

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

/* .... route Classes ....  */
Route::namespace('backend')->prefix('/admin/classes')->middleware(['auth'])->group(function (){
    Route::get('/', 'EventController@index')->name('admin.Event');
    Route::get('/create','EventController@create')->name('admin.Event.create');
    Route::post('/store','EventController@store')->name('admin.Event.store');
    Route::get('/delete/{id}', 'EventController@delete')->name('admin.Event.delete');
    Route::post('/addcoach/{e_id}/{c_id}','EventController@AddCoach')->name('admin.Event.addcoach');
    Route::get('/deletecoach/{e_id}/{c_id}', 'EventController@RemoveCoach')->name('admin.Event.removecoach');
    Route::get('/getallcoach', 'EventController@getallcoach')->name('admin.Event.getallcoach');
    Route::get('/edit/{id}', 'EventController@editevent')->name('admin.Event.edit');
    Route::put('{id}', 'EventController@updateEvent')->name('admin.Event.update');

});
/* .... end Classes route .... */

/* .... route Events ....  */
Route::namespace('backend')->prefix('/admin/events')->middleware(['auth'])->group(function (){
    Route::get('/', 'EventsportController@index')->name('admin.Eventsport');
    Route::get('/create','EventsportController@create')->name('admin.Eventsport.create');
    Route::post('/store','EventsportController@store')->name('admin.Eventsport.store');
    Route::get('/delete/{id}', 'EventsportController@delete')->name('admin.Eventsport.delete');
    // Route::post('/addcoach/{e_id}/{c_id}','EventsportController@AddCoach')->name('admin.Event.addcoach');
    // Route::get('/deletecoach/{e_id}/{c_id}', 'EventsportController@RemoveCoach')->name('admin.Event.removecoach');
    // Route::get('/getallcoach', 'EventsportController@getallcoach')->name('admin.Event.getallcoach');
    Route::get('/edit/{id}', 'EventsportController@editevent')->name('admin.Eventsport.edit');
    Route::put('{id}', 'EventsportController@updateEvent')->name('admin.Eventsport.update');

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
    Route::get('/memberDetails/{id}', 'MemberController@viewById')->name('admin.MemberDetails');
    Route::get('/Activate/{id}', 'MemberController@Activate')->name('admin.Member.Activate');
    Route::get('/transactions', 'MemberController@memberTransaction')->name('admin.Member.transactions');
    Route::get('/transactionDetails/{id}', 'MemberController@transactionById')->name('admin.transDetails');
    Route::get('/accountStatement',  'MemberController@accountStatement')->name('accountStatement');
    Route::get('/accountStatementfilter',  'MemberController@accountStatementfilter')->name('accountStatementfilter');

    

    // Route::get('/create','ProgramController@create')->name('admin.Member.create');
    // Route::post('/store','ProgramController@store')->name('admin.Member.store');
    // // Route::get('/delete/{id}', 'ProgramController@delete')->name('admin.Program.delete');
    // Route::get('/edit/{id}', 'ProgramController@editprogram')->name('admin.Member.edit');
    // Route::put('{id}', 'ProgramController@updateprogram')->name('admin.Member.update');

});
/* .... end Members route .... */


