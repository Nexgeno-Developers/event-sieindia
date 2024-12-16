<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsettingSeeder extends Seeder
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
                'app_name' => 'Eurodental',
                'app_logo' => 'assets/admin/img/app/logo.png',
                'timezone' => 'Asia/Kolkata',
                'ui_mode' => 'light',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];        
        DB::table('admin_settings')->insert($insert);
    }
}
