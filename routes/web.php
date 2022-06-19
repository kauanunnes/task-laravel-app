<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return redirect('/task');
});


Route::get('/task', function (Request $request) {
    $user = $request->user();
    $tasks = Task::orderBy('created_at', 'asc')->where('user_id', $user->id)->get();
 
    return view('layouts.tasks', [
        'tasks' => $tasks
    ]);
    
})->middleware('auth');

Route::get('/task/new', function (Request $request) {
    return view('layouts.new-task');
})->middleware('auth');

Route::get('/task/edit/{task}', function (Task $task) {
    return view('layouts.edit-task', [
        'task' => $task
    ]);
})->middleware('auth');

Route::get('/task/{task}', function (Task $task) {
    return view('layouts.task', [
        'task' => $task
    ]);
})->middleware('auth');
 

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


    $user_id = $request->user()->id;
    $task = new Task;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->attach_url = $request->url;
    $task->user_id = $user_id;
    $task->save();
 
    return redirect('/task');
})->middleware('auth');

Route::put('/task/{task}', function (Task $task) {
    $task->is_done = true;
    $task->save();
});

Route::patch('/task/', function (Request $request) {
    $task = Task::find($request->id);
    // return $task;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->attach_url = $request->attach_url;
    $task->save();
    return $task;
});


 
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
