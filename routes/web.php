<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyCommentController;
use Illuminate\Support\Facades\Route;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::get('login', 'index')->name('login');
    Route::post('login/process', 'process')->name('login-process');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['isLogin:1']], function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('admin', 'index');
            Route::get('admin/moderator', 'moderator');
            Route::get('admin/thread', 'thread');
            Route::get('admin/admin/moderator', 'moderator');
            Route::get('/thread', 'thread');
        });
    });
    Route::group(['middleware' => ['isLogin:2']], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('moderator', 'index');
            Route::get('moderator/profile', 'profile');
            Route::post('moderator/search-thread', 'search')->name("search-threadModerator");
            Route::get('moderator/delete-thread/{id}', 'delete')->name("delete-thread");
        });
        Route::controller(ThreadController::class)->group(function () {
            Route::get('moderator/{id}/thread', 'index');
            Route::get('moderator/create-thread', 'create');
            Route::post('moderator/insert-thread', 'insert')->name("insert-threadModerator");
            Route::get('moderator/{id}/delete-comment/{cid}/{thid}', 'delete_com')->name("delete-comment");
            Route::get('moderator/{id}/delete-subcomment/{cid}/{thid}', 'delete_subcom')->name("delete-subcomment");
        });
        Route::controller(CommentController::class)->group(function () {
            Route::post('moderator/insert-comment', 'insert')->name("insert-commentModerator");
        });
        Route::controller(ReplyCommentController::class)->group(function () {
            Route::post('moderator/insert-reply-comment', 'insert')->name("insert-replyCommentModerator");
        });
    });
    Route::group(['middleware' => ['isLogin:3']], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index');
            Route::get('user/profile', 'profile');
            Route::post('user/search-thread', 'search')->name("search-threadUser");
        });
        Route::controller(ThreadController::class)->group(function () {
            Route::get('user/{id}/thread', 'index');
            Route::get('user/create-thread', 'create');
            Route::post('user/insert-thread', 'insert')->name("insert-threadUser");
        });
        Route::controller(CommentController::class)->group(function () {
            Route::post('user/insert-comment', 'insert')->name("insert-commentUser");
        });
        Route::controller(ReplyCommentController::class)->group(function () {
            Route::post('user/insert-reply-comment', 'insert')->name("insert-replyCommentUser");
        });
    });
});
