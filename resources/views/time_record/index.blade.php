@extends('layouts.app')

@section('content')
<a href="{{ action('TimeRecordController@recordStartTime') }}">開始</a>
<a href="{{ action('TimeRecordController@recordEndTime') }}">終了</a>

<table>
    @foreach($time_records as $time_record)
    <tr>
        <td>{{ $time_record->start_at }}</td>
        <td>{{ $time_record->end_at }}</td>
    </tr>
    @endforeach
</table>
@endsection
