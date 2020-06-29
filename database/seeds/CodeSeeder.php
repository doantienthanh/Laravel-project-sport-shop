<?php

use Illuminate\Database\Seeder;

class CodeSeeder extends Seeder
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
