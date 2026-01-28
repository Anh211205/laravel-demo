<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        for ($i =1;$i<=10;$i++){
            DB::table('news')->insert([
                'title'=>$faker->sentence(6),
                'content'=>$faker->paragraph(5),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
