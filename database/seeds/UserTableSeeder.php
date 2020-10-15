<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [ 
                'id'=>1,
                'full'=>'Administrator',
                'email'=>'admin@gmail.com', 
                'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
                'address'=>'Hà Nội',
                'phone' => '0395954444',
                'level' => 1
            ]
        ]);
    }
}
