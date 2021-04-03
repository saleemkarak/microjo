<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'full_name'=>'Saleem Admin',
            'username'=>'Admin',
            'email'=>'Admin@gmail.com',
            'password'=>Hash::make('1111'),
            'role'=>'admin',
           'status'=>'active',
           ]);

           DB::table('users')->insert([
               'full_name'=>'Saleem Seller',
               'username'=>'Seller',
               'email'=>'seller@gmail.com',
               'password'=>Hash::make('1111'),
               'role'=>'seller',
              'status'=>'active',
              ]);
           DB::table('users')->insert([
               'full_name'=>'Saleem Customer',
               'username'=>'Customer',
               'email'=>'Customer@gmail.com',
               'password'=>Hash::make('1111'),
               'role'=>'customer',
              'status'=>'active',
              ]);
    }
}
