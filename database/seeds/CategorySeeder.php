<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['SÂN NHÂN TẠO','SÂN CỎ TỰ NHIÊN','GIÀY NIKE','GIÀY ADIDAS','GIÀY PUMA','PHỤ KIỆN THỂ THAO'];
        for($i=0;$i<6;$i++){
            DB::table('categories')->insert([
               'name_category'=>$categories[$i]
            ]);
        }
    }
}
