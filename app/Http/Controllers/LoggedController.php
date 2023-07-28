<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $img_path = Storage :: put('uploads', $data['picture']);
        $data['picture'] = $img_path;

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

        if (!array_key_exists('picture', $data)) {
            $data['picture'] = $project -> picture;
        } else {

            $oldImgPath = $project -> picture;

            if ($oldImgPath) {

                Storage :: delete($oldImgPath);
            }

            $img_path = Storage :: put('uploads', $data['picture']);
            $data['picture'] = $img_path;
        }

        $project -> update($data);

        $project -> technologies() -> sync(
            array_key_exists('technologies', $data)
            ? $data['technologies']
            : []);


        return redirect() -> route('project.show', $project -> id);
    }

    public function clearPicture($id) {

        $project = Project :: findOrFail($id);

        $oldImgPath = $project -> picture;

        if ($oldImgPath) {

            Storage :: delete($oldImgPath);
        }

        $project -> picture = null;
        $project -> save();

        return redirect() -> route('project.show', $project -> id);
    }
}
