<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }

    public function store()
    {
       auth()->user()->tweets()->create(request()->validate([
                'body' => ['required', 'min:3', 'max:255', 'string']
        ]));

        return redirect('/tweets');
    }
}
