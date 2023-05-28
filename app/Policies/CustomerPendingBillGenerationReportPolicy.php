<?php

namespace App\Policies;

use App\Models\SalesReport\CustomerPendingBillGenerationReport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPendingBillGenerationReportPolicy
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
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
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
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }
}
