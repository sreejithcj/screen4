<?php

use Illuminate\Database\Seeder;
//require_once '/path/to/Faker/src/autoload.php';

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        // following line retrieve all the user_ids from DB
        //$categories = App\Models\Categories::all('category');
        //$genres = App\Models\Genres::all('genre');
        
        $categories = array(1,2,3,4,5);
        $genres = array(1,2,3,4,5,6,7);
                    
        for ($i = 0; $i < 500; $i++) {
            DB::table('videos')->insert([
                'title' => 'Movie Title'.' ' .$i,
                'brief' => 'Singham Returns is a Hindi action movie and sequel to the 2011 smash hit, 
			Singham. It is a remake of the Malayalam film Ekalavyan and is directed by 
			Rohit Shetty.',
                'duration' => '2 Hours 30 minutes',
                'year' => '2009-01-12',//$faker->year,
                'url' => 'http://localhost/vidoes/video.html',//$faker->url,
                'image' => '../../assets/images/image.jpg',//$faker->imageUrl(250,318),
                'genreId' => 2,//$faker->randomElements($genres),
                'categoryId' => 1,//$faker->randomElements($categories),
                'userId' => 2
            ]);
        }
    }
}
