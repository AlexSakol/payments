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

    public function update(User $user, Payment $payment)
    {
        return $payment->user->id === $user->id;
    }

    public function delete(User $user, Payment $payment)
    {
        return $this->update($user, $payment);
    }

}
