<?php

use Illuminate\Database\Seeder;
use App\Collaborator;

class CollaboratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collaborator::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Collaborator::create([
                'Sector' => 'Administractive',
                'full_name' => $faker->name,
                'birth_date' => $faker->date('Y-m-d'),
                'salary' => mt_rand(1500, 2000),
                'status' => true,
            ]);
        }
    }
}
