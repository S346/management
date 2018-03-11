@extends('layouts.app')

@section('content')
<form action="{{ action('ProjectController@store') }}" method="post" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group mr-1">
        <input type="text" name="name" placeholder="プロジェクト名" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">追加</button>
</form>
<table class="table my-3">
    @foreach($projects as $project)
        <tr>
            <td class="align-middle">
                <a href="{{ action('ProjectController@show', ['id' => $project->id]) }}">{{ $project->name }}</a>
            </td>
            <td class="text-right align-middle">
                <form class="d-inline" action="{{ action('ProjectController@destroy', ['id' => $project->id]) }}" method="post" onclick="return confirm('本当に削除しますか?')">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-danger btn-sm"><i class="material-icons mr-1">delete</i>削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
