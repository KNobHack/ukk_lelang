<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = collect([
            'Action',
            'Adventure',
            'Role-playing',
            'Simulation',
            'Sports',
            'Idle'
        ]);

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'genre' => $genre
            ]);
        }
    }
}
