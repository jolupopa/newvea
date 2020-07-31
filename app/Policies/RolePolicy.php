<?php

namespace App\Policies;

use Spatie\permission\Models\Role;
use App\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(Administrator $administrator)
    {
        //
    }

    /**
     * Determine whether the Administrator can view the role.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Administrator $administrator, Role $role)
    {
        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('View roles');
    }

    /**
     * Determine whether the Administrator can create roles.
     *
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('Create roles');
    }

    /**
     * Determine whether the Administrator can update the role.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Administrator $administrator, Role $role)
    {
        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('Update roles');
    }

    /**
     * Determine whether the Administrator can delete the role.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Administrator $administrator, Role $role)
    {
        if($role->id === 1)
        {
            return false;
            // throw new \Illuminate\Auth\Access\AuthorizationException('No se puede eliminar este rol.');
        }

        return $administrator->hasRole('Admin') || $administrator->hasPermissionTo('Delete roles');
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(Administrator $administrator, Role $role)
    {
        //
    }

    /**
     * Determine whether the Administrator can permanently delete the role.
     *
     * @param  \App\Administrator  $Administrator
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Role $role)
    {
        //
    }
}
