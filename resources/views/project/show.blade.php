@extends('layouts.app')

@section('content')
<h2>{{ $project->name }}</h2>
<form action="{{ action('ProjectController@update', ['id' => $project->id]) }}" method="post" class="form-inline">
    {{ csrf_field() }}
    {{ method_field('patch') }}
    <div class="form-group mr-1">
        <input type="text" name="name" value="{{ $project->name }}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">保存</button>
</form>
@foreach ($users as $user)
    <p>{{ $user->name }}</p>
@endforeach

<a href="{{ url()->previous() }}" class="btn btn-link">戻る</a>
@endsection
