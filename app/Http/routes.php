<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'SymfonyController@index', 'as' => 'home']);

Route::get('/requests', ['uses' => 'SymfonyController@pullRequests', 'as' => 'pull-requests']);

Route::get('/issues', ['uses' => 'SymfonyController@createdIssues', 'as' => 'created-issues']);

Route::get('/releases', ['uses' => 'SymfonyController@pastReleases', 'as' => 'past-releases']);

Route::get('/commits', ['uses' => 'SymfonyController@commitStatistics', 'as' => 'commit-statistics']);