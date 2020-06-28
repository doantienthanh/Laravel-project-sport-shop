<?php
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\auth;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FAKER $faker)
    {

        for( $i=0; $i<5; $i++){
            DB::table('users')->insert([
                'fullName' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'address' =>$faker->address,
                'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'password' => Hash::make('12345'),
                'position'=>'user'
            ]);
            }
            DB::table('users')->insert([
                'fullName' => $faker->name,
                'email' =>'thanhdoan2000pn@gmail.com',
                'address' =>$faker->address,
                'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'password' => Hash::make('admin'),
                'position'=>'admin'
            ]);
    }
}
