<?php

namespace App\Policies;

use App\Models\Operation\DocumentMaster;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentMasterPolicy
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
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, DocumentMaster $documentMaster)
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
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, DocumentMaster $documentMaster)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, DocumentMaster $documentMaster)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, DocumentMaster $documentMaster)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, DocumentMaster $documentMaster)
    {
        //
    }
}
