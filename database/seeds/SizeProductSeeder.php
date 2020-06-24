<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
class SizeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FAKER $faker)
    {
       
        for($i=0;$i<10;$i++){
            DB::table('size_products')->insert([
            'product_id'=>$i+1,
            'size_id'=>$faker->numberBetween($min=1,$max=24)
        ]);
        }
    }
}
