<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(User $user)
    {
        $user = Auth::user();
        return view('userprofile', compact('user'));
    }

    public function updateName(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->save();

        return redirect()->back()
            ->with('message', 'Your name has been changed successfully.');
    }

}
