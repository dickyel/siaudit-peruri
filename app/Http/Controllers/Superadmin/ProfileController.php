<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    //
    //bagian index dashboard
    public function index()
    {
        $user = auth()->user();
        return view('pages.superadmin.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('pages.superadmin.profile.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $requestData = $request->validate([
            'nama_users' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
            'email2' => 'nullable|string|email|max:255',
        ]);

        // Hash the password if provided
        if ($requestData['password']) {
            $requestData['password'] = Hash::make($requestData['password']);
        }

        // Update user data
        $user->update($requestData);

        return redirect()->route('superadmin.profile.index')->with('success', 'Profil berhasil diperbarui.');
    }

}
