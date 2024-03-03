<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Limit;

class LimitPolicy
{

    public function create(User $user)
    {
        return $user->banned == false;
    }

    public function update(User $user, Limit $limit)
    {
        return $this->create($user) && $limit->user->id == $user->id;
    }

    public function delete (User $user, Limit $limit)
    {
        return $this->update($user, $limit);
    }
}
