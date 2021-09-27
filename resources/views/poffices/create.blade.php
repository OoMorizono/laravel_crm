@extends('layouts.main')

@section('title', '新規登録画面')

@section('content')
@if ($errors->any())
<div class="error">
    <p>
        <b>{{ count($errors) }}件のエラーがあります。</b>
    </p>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1>新規登録画面</h1>
<form action="/poffices" method="post">
    @csrf
    <div>
        <label for="name">名前</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="email">メールアドレス</label>
        <input type="text" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label for="postcode">郵便番号</label>
        <input type="number" name="postcode" value="{{ old('postcode') }}">
    </div>
    <div>
        <label for="address">住所</label>
        <textarea name="address" id="" cols="30" rows="10">{{ old('address') }}</textarea>
    </div>
    <div>
        <label for="phoneNumber">電話番号</label>
        <input type="number" name="phoneNumber" value="{{ old('phoneNumber') }}">
    </div>
    <div>
        <input type="submit" value="登録">
    </div>
    <div>
        <button type="button" onclick="location.href='/search'">郵便番号検索に戻る</button>
    </div>
</form>
@endsection