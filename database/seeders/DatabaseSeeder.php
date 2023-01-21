<?php

namespace Database\Seeders;

use App\Models\Gigs;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //for 10 users
        // \App\Models\User::factory(10)->create();

        //for 1 user
        //create() is used here to create custom name and email
        $user = User::factory()->create([
            'name' => 'cheche makweche',
            'email' => 'cheche@gmail.com'
        ]);

        //you can artifiaccly create dummy text using ur own factory
        //php artisan make:factory GigsFactory
        //then in Gigsfactory,in definition(), key in return data 
        //using the gigsfactory
        Gigs::factory(6)->create([
            //user_id defined
            'user_id' => $user->id
        ]);            


        //manually created
        // Gigs::create([
        //     'title' => 'Laravel Senior Developer', 
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);

        // Gigs::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend ,api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
        // ]);
    }
}
