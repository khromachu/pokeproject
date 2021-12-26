<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Запустить наполнение базы данных.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'id' => 1,
            'name' => 'Администратор',
        ]);

        DB::table('user_roles')->insert([
            'id' => 2,
            'name' => 'Редактор',
        ]);

        DB::table('user_roles')->insert([
            'id' => 3,
            'name' => 'Обычный пользователь',
        ]);

        for ($i=1; $i <= 50; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => rand(1, 3),
            ]);
        }
    }
}
