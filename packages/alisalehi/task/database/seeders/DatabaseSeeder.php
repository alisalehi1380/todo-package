<?php

namespace AliSalehi\Task\src\database\seeders;

use AliSalehi\Task\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Task::factory(10)->create();
    }
}
