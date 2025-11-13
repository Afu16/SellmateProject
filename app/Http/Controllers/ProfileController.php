<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'current_password' => 'nullable|string',
            'password'         => 'nullable|string|min:8',
        ]);

        // Flag untuk mendeteksi apakah password berubah
        $passwordChanged = false;
        // Jika user ingin mengubah password, pastikan current_password cocok
        if ($request->filled('password')) {
            if (! $request->filled('current_password') || ! Hash::check($request->current_password, $user->password)) {
                // Jangan simpan apa pun, kembalikan ke halaman settings dengan notifikasi error
                return redirect()->route('settings.index')->with('error', 'Password lama tidak cocok.')->withInput();
            }
            $passwordChanged = true;
        }

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

        // Perbarui password jika ada
        if ($passwordChanged) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Jika password diubah, arahkan ke dashboard. Kalau tidak, tetap di halaman settings.
        if ($passwordChanged) {
            return redirect()->route('dashboard')->with('success', 'Password berhasil diubah dan profil disimpan.');
        }

        return redirect()->route('settings.index')->with('success', 'Profile updated successfully.');
    }
}
