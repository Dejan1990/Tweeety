<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function __invoke()
    {
        return view('explores.index', [
            'users' => User::where('id', '!=', auth()->id())->paginate(50)
        ]);
    }
}
