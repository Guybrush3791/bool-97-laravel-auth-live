@extends('layouts.app')

@section('content')

    <div class="container text-center pt-5">
        <h1>{{ $project -> name }}</h1>
        <p>
            {{ $project -> description }}
        </p>
        <div class="row">
            <span class="col bg-dark text-light rounded mx-3">
                Start date: {{ $project -> start_date }}
            </span>
            <span class="col bg-dark text-light rounded mx-3">
                End date: {{ $project -> end_date }}
            </span>
            <span class="col bg-dark text-light rounded mx-3">
                Difficulty: {{ $project -> difficulty }}
            </span>
        </div>
    </div>

@endsection
