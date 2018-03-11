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
                    <a href="{{ route('recordStartTime') }}" class="btn btn-primary">開始</a>
                @endif
                <a href="{{ route('timeRecords') }}" class="btn btn-link ml-3">レコード一覧</a>
            </div>
        </div>
    </div>
</div>
@endsection
