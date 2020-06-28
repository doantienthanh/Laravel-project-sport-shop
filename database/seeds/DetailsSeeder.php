<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<10;$i++) {
            DB::table('details')->insert([
               'product_id'=>$i+1,
               'color'=>"xanh",
               'sole'=>"FG",
               'weight'=>84,
               'description'=>"úadysadgsaghfsad"
                     ]);
        }
    }
}
