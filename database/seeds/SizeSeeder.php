<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
