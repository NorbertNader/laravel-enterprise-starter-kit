<?php

/*
|--------------------------------------------------------------------------
| Module Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for the module.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'helloworld', 'middleware' => ['web']], function () {
	//
});



// Routes in this group must be authorized.
Route::group(['middleware' => 'authorize'], function () {

    // Helloworld routes
    Route::group(['prefix' => 'helloworld'], function () {
        Route::get('/',        ['as' => 'helloworld.index',         'uses' => 'HelloworldController@index']);
    }); // End of Helloworld group


}); // end of AUTHORIZE middleware group
