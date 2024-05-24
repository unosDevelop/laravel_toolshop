<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('showLoginForm')->with('error', 'You need to login to view your profile');
        }
        return view('profile.show', compact('user'));
    }
    public function edit()
    {
        if (!Auth::check()) {
            return redirect()->route('showLoginForm');
        }

        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
    if (!Auth::check()) {
        return redirect()->route('showLoginForm')->with('error', 'You need to login to update your profile');
    }

    $user = Auth::user();
    $request->validate([
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'birth_date' => 'nullable|date',
        'phone_number' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'occupation' => 'nullable|string|max:255',
    ]);

    $user->birth_date = $request->birth_date;
    $user->phone_number = $request->phone_number;
    $user->address = $request->address;
    $user->occupation = $request->occupation;

    if ($request->hasFile('profile_image')) {
        $imageName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images/profile'), $imageName);
        $user->profile_image = $imageName;
    }

    $user->save();
    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
}

}
