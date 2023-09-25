<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //
    function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    function create(Request $request)
    {
        $validator = $request->validate([
            'title' => ['required', 'string','max:30' ],
            'contents' =>['required', 'string','max:140'],
            'image_at' =>['required', 'image']
        ]);
        return view('tasks.create');
    }

    function store(Request $request)
    {
        $task = new Task;
        $task -> title = $request -> title;
        $task -> contents = $request -> contents;
        $task -> image_at = $request -> image_at;
        $task -> id= Auth::id();
        $task -> save();
    }
}
