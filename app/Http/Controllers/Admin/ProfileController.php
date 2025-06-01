<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            $user = (object)[
                'name' => 'Admin 1',
                'avatar_url' => null, 
                'role_display' => 'Admin' 
            ];
        } else {
            if (!isset($user->avatar_url)) {
                $nameParts = explode(' ', $user->name);
                $initials = count($nameParts) >= 2 ? strtoupper(substr($nameParts[0], 0, 1) . substr(end($nameParts), 0, 1)) : strtoupper(substr($user->name, 0, 1));
                $user->avatar_url = 'https://via.placeholder.com/150/0A1D37/FFFFFF?text=' . $initials;
            }
            if (!isset($user->role_display)) {
                $user->role_display = 'Admin';
            }
        }
        
        return view('admin.profile.index', compact('user'));
    }

  
    public function update(Request $request)
    {
    
        return back()->with('success', 'Profil berhasil diperbarui (simulasi).');
    }
}