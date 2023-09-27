@extends('layouts.app')
@section('content')

<h2>検索結果</h2>

<div class="big-container">
{{-- @if ($query)
    <p>検索クエリ: {{ $query }}</p>
@endif --}}

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
                <a href="#"><i class="far fa-bookmark"></i></a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="edit-button">編集</a>
                <form action='{{ route('tasks.destroy', $task->id) }}' method='post'>
                    @csrf
                    @method('delete')
                    <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("本当に削除しますか？");'>
                </form>
                {{-- <a href="{{ route('tasks.show', $task->id) }}">View Details</a> --}}
            </div>
        </div>
    @endforeach
@endif
</div>

@endsection
