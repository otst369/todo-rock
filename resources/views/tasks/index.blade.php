@extends('layouts.app')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head> 


<header>
  <div class="header-left">
    <span class="todo-text">検索機能</span>
    <div class="search-bar">
      <input type="text" id="searchInput" placeholder="検索したい用語を入力">
      <button id="searchButton" class="search-button">Go</button>
    </div>
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
  {{-- <div class="image-container">
    <img src="{{asset('/storage/images/') . $task->image_at }}" alt="Image">
  </div> --}}
  {{-- <div class="image-container">
    <img src="{{ asset('/storage/images/' . $task->image_at) }}" alt="Image">
  </div> --}}
  <div class="image-container">
    <img src="{{ url('storage/images/' . $task->image_at) }}" alt="Image">
  </div>


  <div class="post-content">
    <h2 class="title">{{ $task->title }}</h2>
    <p class="contents">{{ $task->contents }}</p>

    <a href="#"><i class="far fa-bookmark"></i></a>
    <button class="edit-button">編集</button>
    <button class="delete-button">削除</button>
    {{-- <a href="{{ route('tasks.show', $task->id) }}">View Details</a> --}}
  </div>
</div>
@endforeach
</div>

@endsection

