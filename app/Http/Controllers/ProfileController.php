<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user
                ->tweets()
                //->withLikes()
                ->withCount([
                    'likes as liked_count' => function ($query) {
                        $query->where('liked', true);
                    },
                    'likes as disliked_count' => function ($query) {
                        $query->where('liked', false);
                    }
                ])
                ->paginate(50),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => ['image'],
            'password' => ['required', 'string', 'confirmed']
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path)->with('success', 'You updated your profile successfully!!!'); 
    }
}
