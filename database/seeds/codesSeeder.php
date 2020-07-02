<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class codesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code=['HTML','PHP','JS'];
        $dis=[15,50,90];
        for($i=0;$i<3;$i++){
            DB::table('codes')->insert([
               'code'=>$code[$i],
               'discount'=>$dis[$i]
            ]);
        }
    }
}
