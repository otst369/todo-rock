<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//以降ルーティングブランチにて追加
//タスク一覧表示
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');

//タスク新規作成
Route::get('/tasks/create', [App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');

//タスク保存
Route::post('/tasks', [App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');

//タスク詳細ページ
Route::get('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'show'])->name('tasks.show');

//タスク編集
Route::get('/tasks/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');

//タスク変更更新
Route::put('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');

//タスク削除
Route::delete('/tasks/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');

//以下任意機能
//ブックマークを作成
// Route::get('tasks/{task_id}/bookmarks', [App\Http\Controllers\BookmarkController::class, 'store']);

//ブックマークを取り消す
// Route::get('bookmarks/{bookmark_id}', [App\Http\Controllers\BookmarkController::class, 'destroy']);

//コメント機能
// Route::get('/comments/create/{task_id}',[App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');

// Route::post('/comments',[App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

//自分のtaskだけ削除
// Route::post('/tasks/delete/{id}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('destroy');
