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

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/', ['as' => 'home', 'uses' => 'RouteController@showHomePage']);
Route::get('/login', ['as' => 'login', 'uses' => 'RouteController@showLoginPage']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'RouteController@showAdminDashboard']);
Route::get('/dashboard/video', ['as' => 'dashboard.videos', 'uses' => 'RouteController@showVideos']);
Route::get('/dashboard/video/add', ['as' => 'dashboard.videos.add', 'uses' => 'RouteController@showAddVideoPage']);
Route::get('/dashboard/video/delete/{id}', ['as' => 'dashboard.videos.delete', 'uses' => 'VideoController@deleteVideo']);
Route::get('/logout', ['as' => 'dashboard.logout', 'uses' => 'AdminController@logout']);

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $result = Response::make($file, 200);
    $result->header("Content-Type", $type);

    return $result;
});

// POST
Route::post('/dashboard/video/add', ['as' => 'dashboard.videos.add.submit', 'uses' => 'VideoController@addVideo']);
Route::post('/login', ['as' => 'login.submit', 'uses' => 'AdminController@login']);
