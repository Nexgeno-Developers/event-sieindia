<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [
            [
                'name' => 'Rashidweb',
                'email' => 'rashidk.developer@gmail.com',
                'avatar' => 'assets/admin/img/app/logo.png',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('123123'), //$2y$10$TohmAO3/Ke9rSV9hiWc7d.nZXLpbDIPECBk2sVxYSV6s1uhMLRqVS
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Superadmin',
                'email' => 'info@sieindia.in',
                'avatar' => 'assets/admin/img/app/logo.png',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make('Admin@Eurodental'),
                'remember_token' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];        
        DB::table('admins')->insert($insert);
    }
}
