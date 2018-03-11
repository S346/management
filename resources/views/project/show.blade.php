@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $project->name }}</h2>
    <form action="{{ action('ProjectController@update', ['id' => $project->id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <input type="text" name="name" value="{{ $project->name }}">
        <input type="submit" name="" value="送信">
    </form>
    <a href="{{ url()->previous() }}">戻る</a>
</div>
@endsection
