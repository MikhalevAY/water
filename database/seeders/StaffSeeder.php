<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'last_name' => 'Иванов',
            'name' => 'Иван',
            'patronymic' => 'Иванович',
            'iin' => '123321123321',
            'status_code' => 20,
            'password' => bcrypt('123'),
            'created_at' => now()
        ]);

        User::query()->create([
            'last_name' => 'Петров',
            'name' => 'Петр',
            'patronymic' => 'Петрович',
            'iin' => '555999555999',
            'status_code' => 10,
            'password' => bcrypt('123'),
            'created_at' => now()
        ]);

        User::query()->create([
            'last_name' => 'Сидоров',
            'name' => 'Сидр',
            'patronymic' => 'Сидорович',
            'iin' => '123456654321',
            'status_code' => 30,
            'password' => bcrypt('123'),
            'created_at' => now()
        ]);
    }
}
