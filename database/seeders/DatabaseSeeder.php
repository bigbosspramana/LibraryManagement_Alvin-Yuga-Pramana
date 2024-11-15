<?php

use Illuminate\Database\Seeder;
use Database\Seeders\BookSeeder;
use Database\Seeders\CDSeeder;
use Database\Seeders\JournalSeeder;
use Database\Seeders\PaperSeeder;
use Database\Seeders\SkripsiSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\EbookSeeder;
use Database\Seeders\PustakawanSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BookSeeder::class,
            CDSeeder::class,
            JournalSeeder::class,
            PaperSeeder::class,
            SkripsiSeeder::class,
            AdminSeeder::class,
            PustakawanSeeder::class,
            EbookSeeder::class,
        ]);
    }
}