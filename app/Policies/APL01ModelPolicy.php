<?php

namespace App\Policies;

use App\Models\APL01Model;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class APL01ModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\APL01Model  $aPL01Model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, APL01Model $aPL01Model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\APL01Model  $aPL01Model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, APL01Model $aPL01Model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\APL01Model  $aPL01Model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, APL01Model $aPL01Model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\APL01Model  $aPL01Model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, APL01Model $aPL01Model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\APL01Model  $aPL01Model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, APL01Model $aPL01Model)
    {
        //
    }
}
