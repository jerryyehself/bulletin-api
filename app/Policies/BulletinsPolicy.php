<?php

namespace App\Policies;

use App\Models\Bulletins;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BulletinsPolicy
{
    use HandlesAuthorization;

    private $bulletinList, $closedList;

    public function __construct()
    {
        $this->bulletinList = app('bulletinList')->get('bulletin_list');
        $this->closedList = app('bulletinList')->get('closed_list');
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Bulletins $bulletins)
    {
        //
        // dd($bulletins);
        // if()return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Bulletins $bulletins)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, array $attributes)
    {
        // dd($user->roles);
        $msg = collect();

        $inputNums = collect($attributes['nums']);

        //
        $closed = $inputNums->merge($this->closedList)->duplicates();
        $notAvailable = $inputNums->diff($this->bulletinList->merge($this->closedList));

        if ($closed->count())
            $msg->push('nums alert already closed: ' . $closed->join(', '));

        if ($notAvailable->count())
            $msg->push('nums not availible: ' . $notAvailable->join(', '));

        if ($msg->count())
            return Response::deny($msg->join(', '));

        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Bulletins $bulletins)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Bulletins $bulletins)
    {
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Bulletins $bulletins)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Bulletins  $bulletins
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Bulletins $bulletins)
    {
        //
    }
}
