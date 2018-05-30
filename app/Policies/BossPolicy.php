<?php

namespace App\Policies;

use App\User;
use App\Boss;
use Illuminate\Auth\Access\HandlesAuthorization;

class BossPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return $user->belong === 0;
    }

    /**
     * Determine whether the user can view the boss.
     *
     * @param  \App\User  $user
     * @param  \App\Boss  $boss
     * @return mixed
     */
    public function view(User $user, Boss $boss)
    {
        //
    }

    /**
     * Determine whether the user can create bosses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the boss.
     *
     * @param  \App\User  $user
     * @param  \App\Boss  $boss
     * @return mixed
     */
    public function update(User $user, Boss $boss)
    {
        //
    }

    /**
     * Determine whether the user can delete the boss.
     *
     * @param  \App\User  $user
     * @param  \App\Boss  $boss
     * @return mixed
     */
    public function delete(User $user, Boss $boss)
    {
        //
    }
}
