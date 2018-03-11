@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                @if($user->is_active)
                    <a href="{{ route('recordEndTime') }}" class="btn btn-primary">終了</a>
                @else
                    <form class="" action="{{ route('recordStartTime') }}" method="post">
                        {{ csrf_field() }}
                        <select class="form-control" name="project_id">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">開始</button>
                    </form>
                @endif
                <a href="{{ route('timeRecords') }}" class="btn btn-link ml-3">レコード一覧</a>
                <h3 class="my-3">プロジェクト</h3>
                <ul class="table">
                    @foreach ($projects as $project)
                        <li>{{ $project->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
