<?php

use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('tours')->insert([
                'name'=> $faker->name,
                'image'=>'public/img/'.$i.'.jpg',
                'typetour' =>$faker->text($maxNbChars = 200),
                'schedule'=> $faker->text($maxNbChars = 200),
                'depart'=>$faker->date($format='Y-m-d'),
                'number'=>$faker->numberBetween(1,50),
                'price'=>$faker->randomElement([100, 1000])
            ]);
        }
    }
}
