<?php

namespace App\Policies;

use App\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministratorPolicy
{
    use HandlesAuthorization;
    
    public function before($administrator)
    {
        if($administrator->hasRole('Admin'))
        {
            return true;
        }
    }

    /**
     * Determine whether the user can view any administrators.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(Administrator $administrator)
    {
        //
    }

    /**
     * Determine whether the user can view the administrator.
     *
     * @param  \App\User  $user
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function view(Administrator $authAdministrator, Administrator $administrator)
    {
        return $authAdministrator->id === $administrator->id || 
        $authAdministrator->hasPermissionTo('View administrators') ;
    }

    /**
     * Determine whether the user can create administrators.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Administrator $authAdministrator)
    {
        return $authAdministrator->hasPermissionTo('Create administrators');
    }

    /**
     * Determine whether the user can update the administrator.
     *
     * @param  \App\User  $user
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function update(Administrator $authAdministrator, Administrator $administrator)
    {
        return $authAdministrator->id === $administrator->id || $administrator->hasPermissionTo('Update administrators') ;
    }

    /**
     * Determine whether the user can delete the administrator.
     *
     * @param  \App\User  $user
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function delete(Administrator $authAdministrator, Administrator $administrator)
    {
        return $authAdministrator->id === $administrator->id ||  $administrator->hasPermissionTo('Delete administrators') ;
    }

    /**
     * Determine whether the user can restore the administrator.
     *
     * @param  \App\User  $user
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function restore(Administrator $authAdministrator,  Administrator $administrator )
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the administrator.
     *
     * @param  \App\User  $user
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function forceDelete(Administrator $authAdministrator,  Administrator $administrator)
    {
        //
    }
}
