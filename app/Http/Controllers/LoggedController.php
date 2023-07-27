<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class LoggedController extends Controller
{

    public function show($id) {

        $project = Project :: findOrFail($id);

        return view('show', compact('project'));
    }

    public function create() {

        $types = Type :: all();
        $technologies = Technology :: all();

        return view('create', compact('types', 'technologies'));
    }
    public function store(Request $request) {

        $data = $request -> all();

        $project = Project :: create($data);
        $project -> technologies() -> attach($data['technologies']);

        return redirect() -> route('project.show', $project -> id);
    }

    public function edit($id) {

        $types = Type :: all();
        $technologies = Technology :: all();

        $project = Project :: findOrFail($id);

        return view('edit', compact('types', 'technologies', 'project'));
    }
    public function update(Request $request, $id) {

        $data = $request -> all();

        $project = Project :: findOrFail($id);
        $project -> update($data);

        // if (array_key_exists('technologies', $data))
        //     $project -> technologies() -> sync($data['technologies']);
        // else
        //     $project -> technologies() -> detach();

        $project -> technologies() -> sync(
            array_key_exists('technologies', $data)
            ? $data['technologies']
            : []);


        return redirect() -> route('project.show', $project -> id);
    }
}
