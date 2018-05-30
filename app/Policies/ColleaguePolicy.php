<?php

namespace App\Policies;

use App\User;
use App\Colleague;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColleaguePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->belong === 0) {
            return true;
        }
        else {
            return null;
        }
    }

    /**
     * Determine whether the user can view the colleague.
     *
     * @param  \App\User  $user
     * @param  \App\Colleague  $colleague
     * @return mixed
     */
    public function view(User $user, Colleague $colleague)
    {
        //
    }

    /**
     * Determine whether the user can create colleagues.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $u = Colleague::find($user->id);
        if ($u->role()->whereRole('Добавлять сотрудников')->count() > 0) {
            return true;
        } 
    }

    /**
     * Determine whether the user can update the colleague.
     *
     * @param  \App\User  $user
     * @param  \App\Colleague  $colleague
     * @return mixed
     */
    public function update(User $user)
    {
        $u = Colleague::find($user->id);
        if ($u->role()->whereRole('Редактировать сотрудников')->count() > 0) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the colleague.
     *
     * @param  \App\User  $user
     * @param  \App\Colleague  $colleague
     * @return mixed
     */
    public function delete(User $user)
    {
        $u = Colleague::whereId($user->id)->first();
        if ($u->role()->whereRole('Удалять сотрудников')->count() > 0) {
            return true;
        }
    }
}
