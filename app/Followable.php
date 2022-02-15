<?php 

namespace App;

use App\Models\User;

trait Followable
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function follow(User $user)
    {
        //return $this->follows()->save($user);
        return $this->follows()->attach($user);
    }

    public function unFollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function following(User $user)
    {
        return $this->follows()->where('following_user_id', $user->id)->exists();
    }

    public function toggleFollow(User $user)
    {
        /*if ($this->following($user)) {
            return $this->unFollow($user);
        }

        return $this->follow($user);*/

        return $this->following($user) ? $this->unFollow($user) : $this->follow($user);
    }
}