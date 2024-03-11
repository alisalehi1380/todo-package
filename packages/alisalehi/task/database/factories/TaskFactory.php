<?php

namespace AliSalehi\Task\Database\Factories;

use AliSalehi\Task\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            Task::USER_ID      => User::factory()->create()->getKey(),
            Task::TITLE        => $this->faker->title,
            Task::DESCRIPTION  => $this->faker->text(50),
            Task::ATTACHMENT   => $this->faker->text(5),
            Task::DUE_DATE     => now(),
            Task::IS_COMPLETED => false,
        ];
    }
}
