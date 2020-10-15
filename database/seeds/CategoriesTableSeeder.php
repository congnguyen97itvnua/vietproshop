<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['id'=>1,'name'=>'Nam','slug'=>'nam','parent_id'=>0],
            ['id'=>2,'name'=>'Áo Nam','slug'=>'ao-nam','parent_id'=>1],
            ['id'=>3,'name'=>'Quần Nam','slug'=>'quan-nam','parent_id'=>1],
            ['id'=>4,'name'=>'Quần Au','slug'=>'quan-au','parent_id'=>3],
            ['id'=>5,'name'=>'Nữ','slug'=>'nu','parent_id'=>0],
            ['id'=>6,'name'=>'Áo Nữ','slug'=>'ao-nu','parent_id'=>5],
            ['id'=>7,'name'=>'Quần Nữ','slug'=>'quan-nu','parent_id'=>5]
        ]);
    }
}
