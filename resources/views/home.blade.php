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

                <section class="text-center">
                    @if($user->is_active)
                        <button class="btn btn-secondary btn-lg" disabled="">開始</button>
                        <a href="{{ route('recordEndTime') }}" class="btn btn-primary btn-lg">終了</a>
                    @else
                        <form class="" action="{{ route('recordStartTime') }}" method="post">
                            {{ csrf_field() }}
                            <select class="form-control my-2" name="project_id">
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-lg">開始</button>
                            <button class="btn btn-secondary btn-lg" disabled="">終了</button>
                        </form>
                    @endif
                </section>
                <div class="text-center">
                    <a href="{{ route('timeRecords') }}" class="btn btn-link my-2">レコード一覧</a>
                </div>

                <section class="my-3">
                    <h3>参加中のプロジェクト</h3>
                    <ul class="table my-3">
                        @foreach ($projects as $project)
                            <li>{{ $project->name }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ action('ProjectController@index') }}" class="btn btn-outline-primary btn-sm">全てのプロジェクト</a>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
