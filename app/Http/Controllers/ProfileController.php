<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::find(Auth::id());
        return view('page.user.setting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        $request->validate([
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:50|unique:users,username,' . $user->id,
            'email'     => 'required|email|unique:users,email,' . $user->id,
            'phone'     => 'nullable|string|max:15',
            'address'   => 'nullable|string|max:255',
            'school'    => 'nullable|string|max:255',
            'major'     => 'nullable|string|max:255',
            'foto_link' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'name',
            'username',
            'email',
            'phone',
            'address',
            'school',
            'major',
        ]);

        // Kalau ada upload foto baru
        if ($request->hasFile('foto_link')) {
            $path = $request->file('foto_link')->store('profile', 'public');
            $data['foto_link'] = $path;
        }

        $user->update($data);

        return redirect()->route('settings.index')->with('success', 'Profile updated successfully.');
    }
}
