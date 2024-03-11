<?php

namespace AliSalehi\Task\Policies;

use AliSalehi\Task\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;
    
    public function manage(User $user, Task $task) : bool
    {
        return $user->getKey() === $task->{Task::USER_ID};
    }
}
