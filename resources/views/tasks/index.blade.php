@extends('layouts.app')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>


    <header>
        <div class="header-left">
            <span class="todo-text">検索機能</span>
            <form action="{{ route('tasks.search') }}" method="GET">
                <input type="text" name="query" placeholder="検索キーワード">
                <button type="submit">検索</button>
            </form>
        </div>
        <div class="user-info">
            <button class="register-button">
                <a href="{{ route('tasks.create') }}">新規投稿</a>
            </button>
        </div>
    </header>

    <div class="big-container">
        @foreach ($tasks as $task)
            <div class="post-box">
                <h2 class="name">{{ $task->user->name }}</h2>
                <div class="image-container">
                    <img src="{{ url('storage/images/' . $task->image_at) }}" alt="Image">
                </div>
                <div class="post-content">
                    <h2 class="title">{{ $task->title }}</h2>
                    <p class="contents">{{ $task->contents }}</p>
                    <div class="inside-container">
                        @if($task->user_id == Auth::user()->id)
                        <div class="bookmark">
                            @if($task->likedBy(Auth::user())->count() > 0)
                            <a href="/bookmarks/{{ $task->likedBy(Auth::user())
                            ->firstOrfail()->id }}"><i class="fas fa-bookmark fa-2x"></i></a>
                            @else
                            <a href="/tasks/{{ $task->id }}/bookmarks"><i class="far fa-bookmark fa-2x"></i></a>
                            @endif
                        </div> 
                        <a href="{{ route('tasks.edit', $task->id) }}" class="edit-button">編集</a>
                        <form action='{{ route('tasks.destroy', $task->id) }}' method='post'>
                            @csrf
                            @method('delete')
                            <input type='submit' value='削除'class="btn btn-danger"
                                onclick='return confirm("本当に削除しますか？");'>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
