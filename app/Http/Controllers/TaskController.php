<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //一覧表示
    function index()
    {
        // $tasks = Task::all();
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    //新規作成
    function create(Request $request)
    {
        $tasks = Task::latest()->get();
        // $image_at = request()->('image_at')->getClientOriginName();
        // $image_at = request()->file('image_at')->getClientOriginalName();
        // request()->file('image_at')->storeAs('public/images', $image_at);
        
        return view('tasks.create',['tasks' => '$tasks']);

        
    }

    //新規投稿保存
    function store(Request $request)
    {
        $image_at = $request->file('image_at')->getClientOriginalName();
        $request->file('image_at')->storeAs('public/images', $image_at);

        $validator = $request->validate([
            'title' => ['required', 'string','max:30' ],
            'contents' =>['required', 'string','max:140'],
            'image_at' =>['required', 'image']
        ]);

        $task = new Task;
        $task -> title = $request -> title;
        $task -> contents = $request -> contents;
        $task -> image_at = $image_at;
        $task -> user_id= Auth::id();
        $task -> save();

        // $tasks = Task::all();

        // return view('tasks.index', compact('tasks'));
        return redirect()->route('tasks.index');
    }

    // function show($id)
    // {
    //     $task = Task::find($id);
    //     return view('tasks.show', compact('task'));
    // }


    //編集
    function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit',['task' => $task]);
    }

    //編集したデータを保存
    function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => ['required', 'string','max:30' ],
            'contents' =>['required', 'string','max:140'],
            'image_at' =>['required', 'image']
        ]);

         // 画像がアップロードされた場合にのみ処理を行う
        if ($request->hasFile('image_at')) {
            $image_at = $request->file('image_at')->getClientOriginalName();
            $request->file('image_at')->storeAs('public/images', $image_at);
        }

        $task = Task::find($id);
        $task->title = $request->title;
        $task->contents = $request->contents;
        if (isset($image_at)) {
            $task->image_at = $image_at;
        }
        $task->save();

        return redirect()->route('tasks.index', ['id' => $id]);
    }

    //投稿削除
    function destroy($id)
    {
        $task = Task::find($id);
        $task -> delete();
        return redirect()->route('tasks.index');
    }
    //検索機能
    // TaskController.php
    public function search(Request $request)
    {
        $query = $request->input('query');

        $tasks = Task::where('title', 'LIKE', "%$query%")
                    ->orWhere('contents', 'LIKE', "%$query%")
                    ->get();

        return view('search', compact('tasks', 'query'));
    }


}
