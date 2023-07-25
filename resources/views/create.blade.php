@extends('layouts.app')

@section('content')

    <div class="container text-center">
        <h1>Create new Project</h1>

        <form
            method="POST"
            action="{{ route('project.store') }}"
        >

            @csrf
            @method("POST")

            <label for="name">NAME</label>
            <br>
            <input type="text" name="name" id="name">
            <br>
            <label for="description">DESCRIPTION</label>
            <br>
            <input type="text" name="description" id="description">
            <br>
            <label for="start_date">START DATE</label>
            <br>
            <input type="date" name="start_date" id="start_date">
            <br>
            <label for="end_date">END DATE</label>
            <br>
            <input type="date" name="end_date" id="end_date">
            <br>
            <label for="difficulty">DIFFICULTY</label>
            <br>
            <input type="text" name="difficulty" id="difficulty">
            <br>
            <label for="type_id">Type</label>
            <br>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type -> id }}">
                        {{ $type -> name }}
                    </option>
                @endforeach
            </select>
            <br>

            <input class="my-3" type="submit" value="CREATE">
        </form>
    </div>

@endsection
