<?php

namespace Forum\Policies;

use Forum\User;
use Forum\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;


    public function update(User $user, Thread $thread)
    {
//        if(auth()->user()->id !== $thread->user_id){
//            abort(401,"unauthorized");
//        }

        return $thread->user_id == $user->id;
    }


}
