@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                <p class="card-textcreate">内容：{{ $task->title }}</p>
                <p>投稿日時：{{ $task->created_at }}</p>               
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <input type="hidden" name="task_id" value="{{ $task->id }}">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" 
                    placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">コメントする</button>
            </form>
        </div>
    </div>
</div>


@endsection