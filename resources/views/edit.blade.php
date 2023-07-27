@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <h1>Create new Project</h1>

        <form
            method="POST"
            action="{{ route('project.update', $project -> id) }}"
        >

            @csrf
            @method("PUT")

            <label for="name">NAME</label>
            <br>
            <input type="text" name="name" id="name" value="{{ $project -> name }}">
            <br>
            <label for="description">DESCRIPTION</label>
            <br>
            <input type="text" name="description" id="description" value="{{ $project -> description }}">
            <br>
            <label for="start_date">START DATE</label>
            <br>
            <input type="date" name="start_date" id="start_date" value="{{ $project -> start_date }}">
            <br>
            <label for="end_date">END DATE</label>
            <br>
            <input type="date" name="end_date" id="end_date" value="{{ $project -> end_date }}">
            <br>
            <label for="difficulty">DIFFICULTY</label>
            <br>
            <input type="text" name="difficulty" id="difficulty" value="{{ $project -> difficulty }}">
            <br>
            <label for="type_id">Type</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type -> id }}"
                        @selected($project -> type -> id === $type -> id)
                    >
                        {{ $type -> name }}
                    </option>
                @endforeach
            </select>
            <br>
            @foreach ($technologies as $technology)
                <div class="form-check mx-auto" style="max-width: 300px">
                    <input
                        class="form-check-input"
                        type="checkbox"
                        value="{{ $technology -> id }}"
                        name="technologies[]" id="technology-{{ $technology -> id }}"
                        @foreach ($project -> technologies as $projectTech)
                            @checked($technology -> id === $projectTech -> id)
                        @endforeach
                    >
                    <label class="form-check-label" for="technology-{{ $technology -> id }}">
                        {{ $technology -> name }}
                    </label>
                </div>
            @endforeach

            <input class="my-3" type="submit" value="UPDATE">
        </form>
    </div>

@endsection
