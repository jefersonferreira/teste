<?php

use Illuminate\Database\Seeder;
use App\Sector;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sector::truncate();

        Sector::create([
            'name' => 'Administrative',
        ]);

        Sector::create([
            'name' => 'Financial',
        ]);

        Sector::create([
            'name' => 'Technology',
        ]);

        Sector::create([
            'name' => 'Human Resources',
        ]);
    }
}
