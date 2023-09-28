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
            <div class="image-container">
                <img src="{{ url('storage/images/' . $task->image_at) }}" alt="Image">
            </div>
            <div class="post-content">
                <h2 class="title">{{ $task->title }}</h2>
                <p class="contents">{{ $task->contents }}</p>
                <div class="inside-container">
                    <div class="bookmark">
                    <a href="#"><i class="far fa-bookmark"></i></a>
                    </div>
                <a href="{{ route('tasks.edit', $task->id) }}" class="edit-button">編集</a>
                <form action='{{ route('tasks.destroy', $task->id) }}' method='post'>
                    @csrf
                    @method('delete')
                    <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                </form>
                </div>
            </div>
        </div>
    @endforeach
@endif
</div>
@endsection
