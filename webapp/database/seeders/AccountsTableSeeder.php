<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
    $param = [
        'name' => 'サンプル次郎',
        'account_id' => '0002',
        'email' => 'sample2@example.com',
        'email_verified_at' => now(),
        'password' => bcrypt('password2'),
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
        ];
        DB::table('accounts')->insert($param);
    }
}
