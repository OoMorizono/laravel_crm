@extends('layouts.main')

@section('content')
<h1>顧客詳細画面</h1>
<table border="1">
    <tr>
        <th>顧客ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>郵便番号</th>
        <th>住所</th>
        <th>電話番号</th>
    </tr>
    <tr>
        <td>{{ $poffice->id }}</td>
        <td>{{ $poffice->name }}</td>
        <td>{{ $poffice->email }}</td>
        <td>{{ $poffice->postcode }}</td>
        <td>{{ $poffice->address }}</td>
        <td>{{ $poffice->phoneNumber }}</td>
    </tr>
</table>
<div>
    <button type="button" onclick="location.href='{{ route('poffices.edit', $poffice->id) }}'">編集画面</button>
</div>
<div>
    <form action="/poffices/{{ $poffice->id }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
    </form>
</div>
<div>
    <button type="button" onclick="location.href='{{ route('poffices.index') }}'">一覧へ戻る</button>
</div>
@endsection