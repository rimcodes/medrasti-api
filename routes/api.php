<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseMetaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostMetaController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/posts', [PostController::class, 'posts']);
Route::get('/posts/id/{id}', [PostController::class, 'post']);

Route::get('/posts/{type}', [PostController::class, 'index']);

Route::get('/courses/{id}', [PostController::class, 'course']);

Route::get('/lessons/{id}', [PostController::class, 'lessons']);
Route::get('/lessons/id/{id}', [PostController::class, 'singlelesson']);
Route::get('/topics/{id}', [PostController::class, 'topics']);

Route::get('/meta/{id}', [CourseMetaController::class, 'index']);

Route::get('/thumbnail/{id}', [PostMetaController::class, 'thumbnail']);
Route::get('/video/{id}', [PostMetaController::class, 'video']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
