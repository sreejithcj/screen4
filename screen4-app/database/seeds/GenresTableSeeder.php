<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = array('Romance','Drama','Action','Comedy','Triller');
        for ($i = 0; $i < 5; $i++) {
            DB::table('genres')->insert([
                'genre' => $genres[$i]
            ]);
        }

    }
}
