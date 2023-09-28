<?php

namespace App\Http\Controllers;
use App\Models\Bookmark; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    //
    public function store(Request $request)
    {
        $bookmark = new Bookmark();
        $bookmark->task_id = $request->task_id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();

        return redirect('/tasks');
    }

    public function destroy(Request $request)
    {
        // ブックマーク削除
        $bookmark = Bookmark::find($request->bookmark_id);
        if ($bookmark) {
            $bookmark->delete();
        }

        return redirect('/tasks');
    }
}
