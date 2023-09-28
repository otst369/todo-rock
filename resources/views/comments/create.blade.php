@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <h2>コメント</h2>
                <div class="form-group">
                    <textarea class="form-control" placeholder="内容" rows="5" name="body">
                    </textarea>
                </div>
                <button type="submit" class="btn btn-primary">作成</button>
            </form>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-body">
                    <p class="card-text">内容：{{ $task->contents }}</p>
                    <p>投稿日時：{{ $task->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>関連するタスク</label>
                    <select class="form-control" id="task_id" name="task_id">
                        <option value="{{ $task->id }}">{{ $task->title }}</option>
                        <!-- 他のタスクを追加する場合はここにoptionを追加 -->
                    </select>
                </div>
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-3">コメントする</button>
            </form>
        </div>
    </div>
</div>


@endsection