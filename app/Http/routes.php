<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

Route::group(['middleware' => 'oauth'], function() {

    Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

    /* Route::group(['middleware' => 'CheckProjectOwner'], function() {
      Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);
      }); */

    Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

    /*
      Route::get('client', ['middleware' => 'oauth', 'uses' => 'ClientController@index']);
      Route::post('client', 'ClientController@store');
      Route::get('client/{id}', 'ClientController@show');
      Route::put('client/{id}', 'ClientController@update');
      Route::delete('client/{id}', 'ClientController@destroy');
     */

    Route::group(['prefix' => 'project'], function() {

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::post('{id}/note', 'ProjectNoteController@store');
        Route::get('{id}/note/{noteId}', 'ProjectNoteController@show');
        Route::put('{id}/note/{noteId}', 'ProjectNoteController@update');
        Route::delete('{id}/note/{noteId}', 'ProjectNoteController@destroy');
        
        Route::post('{id}/file', 'ProjectFileController@store');
    });

    /*
      Route::get('project/{id}/note', 'ProjectNoteController@index');
      Route::post('project/{id}/note', 'ProjectNoteController@store');
      Route::get('project/{id}/note/{noteId}', 'ProjectNoteController@show');
      Route::put('project/{id}/note/{noteId}', 'ProjectNoteController@update');
      Route::delete('project/{id}/note/{noteId}', 'ProjectNoteController@destroy');
     */

    /* Route::get('project', 'ProjectController@index');
      Route::post('project', 'ProjectController@store');
      Route::get('project/{id}', 'ProjectController@show');
      Route::put('project/{id}', 'ProjectController@update');
      Route::delete('project/{id}', 'ProjectController@destroy');
     */
});




