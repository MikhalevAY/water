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
    }
}
