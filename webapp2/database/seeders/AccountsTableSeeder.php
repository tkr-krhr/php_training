<?php

database/seeders/AccountsTableSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'サンプル太郎',
            'account_id' => '0001',
            'email' => 'sample@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
