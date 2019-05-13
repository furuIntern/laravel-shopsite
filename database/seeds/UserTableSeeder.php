<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $spadmin = User::create([
            'username'=>'spadmin',
            'password'=>Hash::make('nopass123'),
            'name'=>'Phuc Trung',
            'email'=>'mygalaxy1@gmail.com',
            'phone'=>'0379090515',
        ]);
        $spadmin->assignRole('super-admin');

        $admin = User::create([
            'username'=>'admin',
            'password'=>Hash::make('nopass123'),
            'name'=>'Phuc Trung',
            'email'=>'mygalaxy2@gmail.com',
            'phone'=>'0379090515',
        ]);
        $admin->assignRole('admin');
        $seller = User::create([
            'username'=>'seller',
            'password'=>Hash::make('nopass123'),
            'name'=>'Phuc Trung',
            'email'=>'mygalaxy3@gmail.com',
            'phone'=>'0379090515',
        ]);
        $seller->assignRole('seller');
    }
}
