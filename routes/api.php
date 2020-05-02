<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
    });
});



// start of routes for mobile application

Route::group(['middleware' => 'auth:api'], function () {
//Notifications routes
Route::post('updateFirebaseToken', 'api\NotificationsController@updateFirebaseToken');

// add contact route
Route::post('contact/add', 'api\ContactTracingController@addContact');


// event routes
Route::post('event/trigger', 'api\EventsController@triggerEvents');


// Contact tracing routes
Route::post('contact/verify/user', 'api\ContactTracingController@verifyContactUser');
Route::post('contact/verify/guest', 'api\ContactTracingController@verifyContactGuest');



//user routes
Route::get('/users/single', 'api\UsersController@getSingleUser');
Route::get('/users/contacts', 'api\UsersController@getUserContacts');
Route::get('/users/fences', 'api\UsersController@getUserLocations');
Route::get('/users/contacts/pending', 'api\UsersController@getPendingUserContacts');
Route::get('/users/contacts/rejected', 'api\UsersController@getRejectedUserContacts');


//user testing routes
Route::get('/testing/users/contacts', 'api\UsersController@getUserContactsTesting');
Route::get('/testing/users/contacts/pending', 'api\UsersController@getPendingUserContactsTesting');



});
// end of routes for mobile application

// start of dashboard routes
Route::get('/users', 'api\UsersController@getUsers');
Route::get('/nodes', 'api\UsersController@getNodes');
Route::get('/links', 'api\UsersController@getLinks');
Route::get('/users/single/{userId}', 'api\UsersController@getSingleUserDash');
Route::get('/users/paginate/{query}', 'api\UsersController@getPaginatedUsers');

Route::get('/users/search/{query}', 'api\UsersController@searchUsers');



//fences routes
Route::get('/fences', 'api\FencesController@getFences');
Route::get('/fences/{fencesId}/users', 'api\FencesController@getUsersInFence');



// end of dashboard routes

