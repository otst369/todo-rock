@extends('layouts.app')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>

    <h2>検索結果</h2>
    <div class="big-container">
        @if ($tasks->isEmpty())
            <p>該当するタスクはありません。</p>
        @else
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
                                @if ($task->likedBy(Auth::user())->count() > 0)
                                    <a
                                        href="/bookmarks/{{ $task->likedBy(Auth::user())->firstOrfail()->id }}"><i
                                            class="fas fa-bookmark fa-2x"></i></a>
                                @else
                                    <a href="/tasks/{{ $task->id }}/bookmarks"><i class="far fa-bookmark fa-2x"></i></a>
                                @endif
                            </div>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="edit-button">編集</a>
                            <form action='{{ route('tasks.destroy', $task->id) }}' method='post'>
                                @csrf
                                @method('delete')
                                <input type='submit' value='削除' class="btn btn-danger"
                                    onclick='return confirm("本当に削除しますか？");'>
                            </form>
                            @endif
                            <a href="{{ route('comments.create', $task->id) }}" class="comment-button">コメント</a>
                        </div>
                        <p class="post-date">投稿日時 : {{ $task->created_at }}</p>
                        <p class="update-date">更新日時 : {{ $task->updated_at }}</p>

                        <h5>コメント一覧</h5>
                        @foreach($task->comments as $comment)
                        <div class="card mt-3">
                            <h6 class="card-header">投稿者：{{ $comment->user->name }}</h6>
                            <div class="card-body">
                                <h6 class="card-title">投稿日時：{{ $comment->created_at }}</h6>
                                <p class="card-text">内容：{{ $comment->body }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
