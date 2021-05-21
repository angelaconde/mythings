<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Check if the user is the authenticated user
     * 
     * @return boolean
     */
    public function isSelf(User $user)
    {
        return $user->id == Auth::user()->id ? true : false;
    }

    /**
     * Display the user's profile
     * 
     * @return void
     */
    public function view()
    {
        $user = Auth::user();
        return view('userprofile', compact('user'));
    }

    /**
     * Update the user's name
     * 
     * @return void
     */
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

    /**
     * Replace the user's avatar
     * 
     * @return void
     */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store in avatars folder
        $imageName = Auth::user()->id . '_' . time() . '.' . $request->image->extension();
        $request->image->move(public_path('img/avatars'), $imageName);

        // Change in database
        $user = User::find(Auth::user()->id);
        $oldAvatar = $user->avatar;
        $user->avatar = $imageName;
        $user->save();

        // Delete the old file if not the default one
        if ($oldAvatar != 'user.jpg') {
            File::delete(public_path('img/avatars/' . $oldAvatar));
        }

        return redirect()->back()->with('message', 'Your avatar has been changed successfully.');
    }

    /**
     * Reset the user's avatar
     * 
     * @return void
     */
    public function resetAvatar()
    {
        // Change in database
        $user = User::find(Auth::user()->id);
        $oldAvatar = $user->avatar;
        $user->avatar = 'user.jpg';
        $user->save();

        // Delete the old file if not the default one
        if ($oldAvatar != 'user.jpg') {
            File::delete(public_path('img/avatars/' . $oldAvatar));
        }

        return redirect()->back()->with('message', 'Your avatar has been changed successfully.');
    }

    /**
     * Changes the user's wishlist to private
     * 
     * @return void
     */
    public function makeWishlistPrivate()
    {
        $user = User::find(Auth::user()->id);
        $user->wishlist = false;
        $user->save();

        return redirect()->back()->with('message', 'Your wishlist is now private.');
    }

    /**
     * Changes the user's wishlist to public
     * 
     * @return void
     */
    public function makeWishlistPublic()
    {
        $user = User::find(Auth::user()->id);
        $user->wishlist = true;
        $user->save();

        return redirect()->back()->with('message', 'Your wishlist is now public.');
    }

    /**
     * Confirms deleting user
     * 
     * @return void
     */
    public function confirmDelete(User $user)
    {
        if ($this->isSelf($user)) {
            return view('confirmdelete', compact('user'));
        } else {
            return view('errors.500');
        }
    }

    /**
     * Deletes user
     * 
     * @return void
     */
    public function delete(User $user)
    {
        if ($this->isSelf($user)) {
            $user->deleted_at = NOW();
            $user->email = $user->email . '_deactivated_' . time();
            $user->save();
            return redirect('/');
        } else {
            return view('errors.500');
        }
    }
}
