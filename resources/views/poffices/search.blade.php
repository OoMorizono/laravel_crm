@extends('layouts.main')

@section('title', '郵便番号検索画面')

@section('content')
<h1>郵便番号検索画面</h1>
<form action="#" method="get">
    <input type="search" name="search" placeholder="検索したい郵便番号">
    <input type="submit" name="submit" value="検索">
</form>
<button type="button" onclick="location.href='{{ route('poffices.index') }}'">一覧へ戻る</button>

@endsection