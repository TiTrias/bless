<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(User $user){
        return in_array($user->type, ['distributor', 'leader']);
    }
    public function delete(User $user){
        return in_array($user->type, ['leader']);
    }
    public function path(User $user){
        return in_array($user->type, ['distributor','leader']);
    }
}
