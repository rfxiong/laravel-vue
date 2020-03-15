<?php

namespace App\Policies;

use App\Admin\Mydb;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MydbPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any mydbs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the mydb.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Mydb  $mydb
     * @return mixed
     */
    public function view(User $user, Mydb $mydb)
    {
        //
    }

    /**
     * Determine whether the user can create mydbs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the mydb.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Mydb  $mydb
     * @return mixed
     */
    public function update(User $user, Mydb $mydb)
    {
        //
    }

    /**
     * Determine whether the user can delete the mydb.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Mydb  $mydb
     * @return mixed
     */
    public function delete(User $user, Mydb $mydb)
    {
        //
    }

    /**
     * Determine whether the user can restore the mydb.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Mydb  $mydb
     * @return mixed
     */
    public function restore(User $user, Mydb $mydb)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the mydb.
     *
     * @param  \App\User  $user
     * @param  \App\Admin\Mydb  $mydb
     * @return mixed
     */
    public function forceDelete(User $user, Mydb $mydb)
    {
        //
    }
}
