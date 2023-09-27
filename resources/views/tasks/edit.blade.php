@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update' , $task->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" value="{{ $task->title }}" name="title" required autofocus maxlength="30">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contents" class="col-md-4 col-form-label text-md-right">Contents</label>

                            <div class="col-md-6">
                                <textarea id="contents" class="form-control" name="contents" required maxlength="140">{{ $task->contents }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_at" class="col-md-4 col-form-label text-md-right">Image</label>
                        
                            <div class="col-md-6">
                                <input id="image_at" type="file" class="form-control custom-file-input" name="image_at" required accept="image/*">
                            </div>
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection














