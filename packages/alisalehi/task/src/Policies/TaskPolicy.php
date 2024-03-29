<?php

namespace AliSalehi\Task\Policies;

use AliSalehi\Task\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskPolicy
{
    public static function allows(Task $task) : bool
    {
        Auth::loginUsingId(1);
        return Auth::user()->getKey() === $task->{Task::USER_ID};
    }
}
