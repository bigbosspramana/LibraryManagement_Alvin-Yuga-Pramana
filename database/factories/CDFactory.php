<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CD;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CD>
 */
class CDFactory extends Factory
{
    protected $model = CD::class;

    public function definition()
    {
        $cds = [
            'Belajar Laravel untuk Pemula',
            'Pengembangan Web dengan PHP',
            'Mastering JavaScript',
            'Fundamentals of Python Programming',
            'React for Beginners',
            'Web Design with HTML & CSS',
            'Database Management with MySQL',
            'Data Science for Beginners',
            'Introduction to Artificial Intelligence',
            'Mobile App Development with Flutter',
        ];

        $genres = ['Pop','Rock','Jazz','Classical','Hip-Hop','Metal',];
        
        $cd = $cds[array_rand($cds)];
        $genre = $genres[array_rand($genres)]; 

        return [
            'Judul CD' => $cd,
            'Artis' => $this->faker->name,
            'Genre' => $genre,
            'Tahun Terbit' => $this->faker->numberBetween(2005, 2024),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
