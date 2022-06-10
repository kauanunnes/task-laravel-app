<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    return view('home');
});
 
/**
 * Add New Task
 */
Route::get('/task', function (Request $request) {
    $tasks = Task::orderBy('created_at', 'asc')->get();
 
    return view('layouts.tasks', [
        'tasks' => $tasks
    ]);
    
});

Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:150',
        'description' => 'max:288',
    ]);
 
    if ($validator->fails()) {
        return redirect('/task')
            ->withInput()
            ->withErrors($validator);
    }

    $task = new Task;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->attach_url = $request->url;
    $task->user_id = 1;
    $task->save();
 
    return redirect('/');
});
 
 
/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    //
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
