<?php

use Illuminate\Database\Seeder;

class CodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $code=['PHP','LARAVEL','CSS','HTML'];
        $dis=[50,30,20,10];
        for($i=0;$i<4;$i++){
            DB::table('codes')->insert([
               'code'=>$code[$i],
               'discount'=>$dis[$i]
            ]);
        }
    }
}
