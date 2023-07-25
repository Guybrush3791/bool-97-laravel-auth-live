<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake() -> unique() -> randomElement([
                'programming',
                'eletronics',
                'ai',
                'videogames',
                'sound',
                'music',
                'blockchain web3',
                'art',
                'design',
                'nft'
            ]),
            'description' => fake() -> paragraph()
        ];
    }
}
