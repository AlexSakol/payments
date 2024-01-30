<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */

    public function create(User $user)
    {
        return $user->banned == false;
    }

    public function update(User $user, Payment $payment)
    {
        return $this->create($user) && $payment->user->id == $user->id;
    }

    public function delete(User $user, Payment $payment)
    {
        return $this->update($user, $payment);
    }

}
