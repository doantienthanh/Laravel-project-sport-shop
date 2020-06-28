<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies=['NIKE','PUMA','ADIDAS','MIZUNO','IWIN','PAN THÁI'];
        for($i=0;$i<6;$i++){
            DB::table('companies')->insert([
               'name_company'=>$companies[$i]
            ]);
        }
    }
}
