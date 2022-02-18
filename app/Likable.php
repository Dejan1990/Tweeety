<?php

namespace App;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('tweet_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($liked = true)
    {
        return $this->likes()->updateOrCreate(
            [
                'user_id' => auth()->user()->id
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike()
    {
        return $this->like(false);
    }
}