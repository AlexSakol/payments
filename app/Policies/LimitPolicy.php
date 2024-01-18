<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Limit;

class LimitPolicy
{
    /**
     * Create a new policy instance.
     */

    public function update(User $user, Limit $limit)
    {
        return $limit->user->id === $user->id;
    }

    public function delete (User $user, Limit $limit)
    {
        return $this->update($user, $limit);
    }
}
