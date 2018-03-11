@extends('layouts.app')

@section('content')
<table class="table">
    <tr>
        <th>レコード数</th>
        <td>{{ $count }}</td>
    </tr>
    <tr>
        <th>合計時間</th>
        <td>{{ $sum }}</td>
    </tr>
</table>

<table class="table">
    <thead>
        <tr>
            <th>開始</th>
            <th>終了</th>
            <th>時間</th>
            <th>プロジェクト</th>
        </tr>
    </thead>
    <tbody>
        @foreach($time_records as $time_record)
        <tr>
            <td>{{ $time_record->getStartAt() }}</td>
            <td>{{ $time_record->getEndAt() }}</td>
            <td>{{ $time_record->getDiffTime() }}</td>
            <td>{{ $time_record->getProjectName() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
