<?php

namespace App\Policies;

use App\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    use HandlesAuthorization;

   

    /**
     * Determine whether the user can view the permission.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function view(Administrator $administrator, Permission $permission)
    {
        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('View permissions');
    }

   

    /**
     * Determine whether the user can update the permission.
     *
     * @param  \App\User  $user
     * @param  \Spatie\Permission\Models\Permission  $permission
     * @return mixed
     */
    public function update(Administrator $administrator, Permission $permission)
    {
        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('Update permissions');
    }


}
