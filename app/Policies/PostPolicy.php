<?php

namespace App\Policies;

use App\Post;
use App\Administrator;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * Determine whether the Administrator can view any posts en index.
     *
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function viewAny(Administrator $administrator)
    {
        
    }

    /**
     * Determine whether the Administrator can view the post view detalle.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(Administrator $administrator, Post $post)
    {
        return $administrator->id === $post->administrator_id ||                $administrator->hasPermissionTo('View posts') ;
    }

    /**
     * Determine whether the Administrator can create posts.
     *
     * @param  \App\Administrator  $administrator
     * @return mixed
     */
    public function create(Administrator $administrator)
    {
        return $administrator->hasPermissionTo('Create posts');
    }

    /**
     * Determine whether the Administrator can update the post.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(Administrator $administrator, Post $post)
    {
        return $administrator->id === $post->administrator_id || $administrator->hasPermissionTo('Update posts');
    }

    /**
     * Determine whether the Administrator can delete the post.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(Administrator $administrator, Post $post)
    {
        return $administrator->id === $post->administrator_id || $administrator->hasPermissionTo('Delete posts');
    }

    /**
     * Determine whether the Administrator can restore the post.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(Administrator $administrator, Post $post)
    {
        //
    }

    /**
     * Determine whether the Administrator can permanently delete the post.
     *
     * @param  \App\Administrator  $administrator
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(Administrator $administrator, Post $post)
    {
        //
    }
}
