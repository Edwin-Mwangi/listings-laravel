<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GigsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //faker from oneof builtin classes used by factory contains
        //some built in methods to generate a specific type of dummytext
        //eg sentence from a sentece of dummytext,none for comma-separated tags,
        //url for url etc...check below code
        return [
            'title' => $this->faker->sentence(), 
            'tags' => 'laravel, javascript,python',
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'description'=> $this->faker->paragraph()
        ];
    }
}
