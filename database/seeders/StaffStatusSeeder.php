<?php

namespace Database\Seeders;

use App\Models\StaffStatus;
use Illuminate\Database\Seeder;

class StaffStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            ['code' => 10, 'status' => 'Новый'],
            ['code' => 20, 'status' => 'Действующий'],
            ['code' => 30, 'status' => 'Восстановление пароля'],
            ['code' => 40, 'status' => 'Отключен'],
        ];

        StaffStatus::query()->insert($statuses);
    }
}
