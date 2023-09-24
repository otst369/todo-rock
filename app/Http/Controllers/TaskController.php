<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

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


}
