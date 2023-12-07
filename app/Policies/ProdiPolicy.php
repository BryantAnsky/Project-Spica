<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\prodi;
use App\Models\User;

class ProdiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, prodi $prodi): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role == 'A';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, prodi $prodi): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, prodi $prodi): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, prodi $prodi): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, prodi $prodi): bool
    {
        //
    }
}
