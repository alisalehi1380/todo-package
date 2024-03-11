<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $userId = User::factory()->create()->getKey();
        for ($i = 0; $i < 3; $i++) {
            DB::table('tasks')->insert([
                'user_id'  => $userId,
                'title'    => $userId,
                'due_date' => now()->subDay()
            ]);
        }
        for ($i = 0; $i < 3; $i++) {
            DB::table('tasks')->insert([
                'user_id'      => $userId,
                'title'        => $userId,
                'due_date'     => today(),
                'is_completed' => true
            ]);
        }
        for ($i = 0; $i < 3; $i++) {
            DB::table('tasks')->insert([
                'user_id'  => $userId,
                'title'    => $userId,
                'due_date' => now()->addDay()
            ]);
        }
    }
}
