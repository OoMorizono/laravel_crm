@extends('layouts.main')

@section('content')
<h1>顧客一覧</h1>
<table border="1">
    <tr>
        <th>顧客ID</th>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>郵便番号</th>
        <th>住所</th>
        <th>電話番号</th>
    </tr>
    @foreach ($poffices as $poffice)
    <tr>
        <td>
            <a href="/poffices/{{ $poffice->id }}">{{ $poffice->id }}</a>
        </td>
        <td>{{ $poffice->name }}</td>
        <td>{{ $poffice->email }}</td>
        <td>{{ $poffice->zipcode }}</td>
        <td>{{ $poffice->address }}</td>
        <td>{{ $poffice->phone_number }}</td>
    </tr>
    @endforeach
</table>
<div>
    <button type="button" onclick="location.href='/poffices/search'">新規作成</button>
</div>
@endsection