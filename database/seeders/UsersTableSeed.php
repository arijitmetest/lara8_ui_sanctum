<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// i have added
use DB;
use Hash;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'name'=>'Arijit Das',
                'email'=>'arijit.mailme@gmail.com',
                'password'=>Hash::make('12345678')
            ]
        );
    }
}
