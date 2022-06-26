<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $users = User::all();
        $genders = User::getGenders();
        return view('user.edit', compact('users', 'user', 'genders'));
    }
}
