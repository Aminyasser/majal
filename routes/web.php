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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Post;
use App\User;
use App\Notifications\PostNewNotification;
use Illuminate\Support\Facades\Auth;
use App\Services;
use Illuminate\Support\Facades\Notification;
use Egulias\EmailValidator\Warning\Comment;




Route::get('/', 'HomeController@index');
Route::get('/newhome', function(){
    return  view('home.home');
});




Route::get('/profiles', 'HomeController@profiles');
Route::get('/problem', 'ReportsController@problem');

Route::post('/discover', 'HomeController@likepost')->name('like');
// Route::get('/moves', 'HomeController@move')->name('moves');

Route::get('/about', 'HomeController@about');

// Route::get('/newhome', function () {
//     return view('pages.home');
// });




// post controller



Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
    //route('comment')
    Route::group(['prefix' => 'create', 'as' => 'create.'], function () {
        Route::post('/{id}', ['as' => 'index', 'uses' => 'CommentsController@store']);
    });

    Route::group(['prefix' => 'show', 'as' => 'show.'], function () {
        Route::get('{id}', ['as' => 'index', 'uses' => 'CommentsController@show']);
    });

    // Route::group(['prefix' => 'edit', 'as' => 'edit.'], function () {
    //     Route::put('{id}', ['as' => 'index', 'uses' => 'CommentsController@update']);
    // });

});
Route::get('/delcomment/{id}', 'CommentsController@destroy')->name('comment.destroy');


// create


Route::post('/posts', 'postController@store')->name('posts.store');
// search



// update

Route::get('/posts/{id}/edit', 'postController@edit')->name('posts.edit');

Route::put('/posts/{id}/update', 'postController@update')->name('posts.update');

// users

Route::delete('/deleteposts/{id}', 'postController@destroy')->name('posts.destroy');

Route::get('/posts/{post}/{name}', 'viewcontroller@show')->name('posts.show');



// user delete
Route::delete('/users/{id}/delete', 'UserController@destroy')->name('users.destroy');

// update
Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');


Route::put('/users/{id}', 'UserController@update')->name('users.update');

Route::put('/users/{id}/info', 'UserController@updateinfo')->name('users.updateinfo');


Route::get('/users/{id}/pro', 'UserController@covedit')->name('users.proedit');


Route::put('/userpro/{id}', 'UserController@update_cover');

// show
// Route::get('/users/{id}','UserController@show');

Route::get('/show/{id}/{name}', 'viewcontroller@user')->name('users.show');

// dashbord
Route::get('/profile/{name}', 'viewcontroller@index')->name('profile');
//
Route::get('/editcomment/{id}', 'CommentsController@editcomment');

Route::put('/updatecomment/{id}/', 'CommentsController@updatecomment');

Route::post('/posts/comment/save', 'CommentsController@aj_store')->name('comment_save');

Route::post('/posts/comment/{id}', 'CommentsController@store')->name('comment_save');

// city
Route::get('/city/create', 'CityController@create')->name('city.create');

Route::post('/city', 'CityController@store')->name('city.store');

Route::get('/cites', 'CityController@index')->name('city.show');

Route::get('/citesuser/{id}/{city}', 'CityController@cityuser')->name('city.users');

Route::delete('/cites/{id}', 'CityController@destroy')->name('city.destroy');
// jobs
Route::get('/job/create', 'JobController@create')->name('job.create');

Route::post('/job', 'JobController@store')->name('job.store');

Route::get('/jobsuser/{id}', 'JobController@jobsuser')->name('job.users');

Route::delete('/jobs/{id}', 'JobController@destroy')->name('job.destroy');

// services
// create Services
Route::get('/MarketPlace', 'ServicesController@create')->name('service.create');
// save Services
Route::post('/saveservices', 'ServicesController@store')->name('service.store');
// all Services
Route::get('/moves', 'ServicesController@index')->name('service.services');
// show 1 Services
Route::get('/service/{id}/{name_services}', 'viewController@showservies')->name('service.show');
// Services dashbord
Route::get('/tbmoves', 'ServicesController@tbmove')->name('service.tbmove');
// Services edit
Route::get('/Servis/{id}/{name_services}/edit', 'ServicesController@edit')->name('service.edit');
// Services update
Route::put('/Servisupdate/{id}', 'ServicesController@update')->name('service.update');
// delete Services
Route::delete('/Servisdel/{id}', 'ServicesController@destroy')->name('service.destroy');
//
// music
// create
Route::get('/music/create', 'MusicController@create')->name('music.create');
// save
Route::post('/music', 'MusicController@store')->name('music.store');

// show music
Route::get('/music/{id}/{name}', 'MusicController@show');

// delet
Route::delete('/music/{id}', 'MusicController@destroy')->name('music.destroy');
// search
Route::post('/musicsearch', 'MusicController@searchmusic');

Route::get('/listen', 'MusicController@listen');

// search controller //

Route::get('/news', 'CommentsController@news')->name('news');

Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

// freinds

Route::get('/freind/{id}', 'admincontroller@storefreind')->name('friend.add');

Route::post('/addfreind/{id}', 'admincontroller@storefreind')->name('friend.add');


Route::get('/totalfrin', 'admincontroller@totalfriend');

Route::get('/delfreind/{id}', 'admincontroller@destroy')->name('friend.destroy');

Route::delete('/delfreindF/{id}', 'admincontroller@destroyF');

// chat


// chat
Route::post('send-message','ChatController@store');
Route::get('/chat/{id}',  'ChatController@callmessage');
Route::get('/message/{id}', 'HomeController@indexchat')->name('home');
Route::get('/room', 'HomeController@allmessage')->name('home');
Route::get('/home', 'HomeController@allmessage');
Route::get('/json','HomeController@jsonResponse');
Route::get('/sound/','ChatController@soundCheck');
Route::get('/seen/','ChatController@seenMessage');
Route::get('/seenUpdate/','ChatController@seenUpdate');
Route::get('/allmessageview/','ChatController@allMessageView');
Route::get('/singleSeenUpdate/{id}','ChatController@singleSeenUpdate');
Route::post('/typing/','ChatController@typing');
Route::get('/deletemessage/{id}','ChatController@deletemessage');
Route::get('/typing-receve/{id}','ChatController@typinc_receve');
Route::get('/users/room',function(){
    return view('chat.users');
});
// like post

Route::get('/like/{id}', 'likecontroller@givelike')->name('like.give');

Route::get('/dellike/{id}', 'likecontroller@deletelike')->name('del.like');

Route::get('autocomplete', 'SearchController@search');

Route::get('/searchuser', 'SearchController@searchuser');
// controle report
Route::post('/reportsus', 'UserController@reportuser');

Route::post('/recover', 'ReportsController@recoveracc');


Route::Put('/actionrequs/{id}', 'ReportsController@update')->name('report.update'); // تغير الحالة




Route::get('/getrecov', 'ReportsController@getrecoveruser');


Route::get('/allreport', 'UserController@allreport');

// pages

Route::post('/nawpage', 'Pagesusercontroller@createpage'); // create new page
Route::get('/editmypage/{id}/{name_page}', 'Pagesusercontroller@editpage'); // edit new page
Route::PUT('/updatemypage/{id}', 'Pagesusercontroller@updatepage'); // edit new page
Route::delete('/removepage/{id}', 'Pagesusercontroller@deletepage')->name('page.delete'); // delete my page
Route::post('/pagesearch', 'Pagesusercontroller@searchpage'); // search page



// postpage
Route::get('/AllPages', 'Pagesusercontroller@pages'); // get all pages
Route::get('/page/{id}/{name_page}/{serv}', 'Pagesusercontroller@getonepage');
Route::post('/creatpostpage', 'postspageController@nawpostpage'); // create post in page
Route::get('/pagepost/{id}/{dis}', 'viewController@postpage'); // show post from page
Route::get('/editpagepost/{id}/{dis}', 'postspageController@editpostpage'); // edit post from page
Route::put('/updatepagepost/{id}', 'postspageController@updatepostpage'); // edit post from page
Route::delete('/postspage/{id}', 'postspageController@destroy')->name('postspage.destroy');  // delete my post form page

// dashboard

Route::get('/dashboard', 'dashboardcontroller@home');
Route::get('/dashboard/users', 'dashboardcontroller@users');
Route::get('/dashboard/posts', 'dashboardcontroller@posts');
Route::get('/dashboard/pages', 'dashboardcontroller@pages');
Route::get('/dashboard/postpages', 'dashboardcontroller@postpage');
Route::get('/dashboard/market', 'dashboardcontroller@market');
Route::get('/dashboard/reports', 'dashboardcontroller@reports');

Route::get('/dashboard/city', 'dashboardcontroller@city');
Route::get('/dashboard/job', 'dashboardcontroller@job');
Route::get('/dashboard/music', 'dashboardcontroller@music');
Route::get('/dashboard/sendemail', 'dashboardcontroller@sendemail');
Route::get('/dashboard/likes', 'dashboardcontroller@likes');
Route::get('/dashboard/comments', 'dashboardcontroller@comments');
Route::Put('/dashboard/update/email/{id}', 'dashboardcontroller@upEmail')->name('update.email');
Route::put('/dashboard/accpet/{id}', 'dashboardcontroller@accpet')->name('update.services');


//
Route::get('/Verify/{token}','ReportsController@Verify')->name('Verify');




// playlist

Route::post('/Addplaylist', 'PlaylistController@storepaly')->name('play.store');

// story
Route::post('/story', 'StoryController@addstory');




// saved
Route::get('/savedpost/{id}', 'SavedController@saved')->name('saved.post');
Route::get('/deletesaved/{id}', 'SavedController@deletesaved')->name('saveds.del');


// mailer

Route::get('/start', 'MailController@start');
Route::get('/ship', 'MailController@ship');
Route::post('/complete', 'MailController@complete');


// new front end


Auth::routes(['verify' => true]);

Auth::routes();
