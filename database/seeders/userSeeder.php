<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create = protected
        User::create([
            'name'=>'admin', 'email' => 'admin@example.com', 'password'=> Hash::make('admin')
        ])->user_roles()->attach(1);


    }
}
