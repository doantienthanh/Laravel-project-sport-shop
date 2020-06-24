<?php

use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=20;$i<45;$i++){
            DB::table('sizes')->insert([
            'size'=>$i
        ]);
        }
    }
}
