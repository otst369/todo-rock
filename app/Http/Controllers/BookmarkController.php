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
        // dd($request->bookmark_id);
        $bookmark = new Bookmark();
        $bookmark->task_id = $request->task_id;
        $bookmark->user_id = Auth::user()->id;
        $bookmark->save();

        return redirect('');
    }

    public function destroy(Request $request)
    {
        $Bookmark = Bookmark::find($request->bookmark_id);
        $Bookmark->delete();
        return redirect('/tasks');
    }
}
