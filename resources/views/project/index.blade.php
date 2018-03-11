@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ action('ProjectController@store') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="プロジェクト名">
        <input type="submit" name="" value="登録">
    </form>
    <table>
        @foreach($projects as $project)
            <tr>
                <th>
                    <a href="{{ action('ProjectController@show', ['id' => $project->id]) }}">{{ $project->name }}</a>
                </th>
                <td>
                    <form class="d-inline" action="{{ action('ProjectController@destroy', ['id' => $project->id]) }}" method="post" onclick="return confirm('本当に削除しますか?')">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <input type="submit" name="" value="削除">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</div>
@endsection
