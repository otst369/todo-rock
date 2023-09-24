<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

  <header>
    <div class="header-left">
      <span class="todo-text">todo-list</span>
      <div class="search-bar">
        <input type="text" id="searchInput" placeholder="検索">
        <button id="searchButton" class="search-button">検索</button>
      </div>
    </div>
    <div class="user-info">
      <button class="register-button">新規投稿</button>
      <span class="user-name">ユーザー名</span>
    </div>
  </header>

{{-- @foreach ($posts as $post) --}}
<div class="post-box">
  <div class="image-container">
    {{-- <img src="resources/img/tatemono_gakkou.png" alt="Image"> --}}
    <img src="/img/tatemono_gakkou.png" alt="Image">

  </div>
  <div class="post-content">
    <h2 class="title">タイトル</h2>
    <p class="contents">説明(discription)</p>
    {{-- <button class="like-button">いいね</button> --}}
    <a href="#"><i class="far fa-heart"></i></a>
    <button class="edit-button">編集</button>
    <button class="delete-button">削除</button>
  </div>
</div>
{{-- @endforeach --}}

</body>
</html>
