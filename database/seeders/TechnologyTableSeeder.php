<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Technology;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology :: factory() -> count(10) -> create();

        // $technologies = Technology :: factory() -> count(10) -> create();

        // foreach ($technologies as $technology) {

        //     $projects = Project :: inRandomOrder() -> limit(rand(2, 4)) -> get();

        //     $technology -> projects() -> attach($projects);
        // }
    }
}
