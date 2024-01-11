<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@mail.cl',
            'password'=>Hash::make('1234')
        ]);
        $admin->assignRole('admin');

        $editor = User::create([
            'name'=>'editor',
            'email'=>'editor@mail.cl',
            'password'=>Hash::make('1234')
        ]);

        $editor->assignRole('editor');
    }
}
