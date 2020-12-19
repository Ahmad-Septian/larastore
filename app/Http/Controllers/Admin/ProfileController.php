<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile($id)
    {
        // ambil id user dari model User
        $user = User::findOrFail($id);

        // jika user ada redirect ke view pofile index, jika tidak ada redirect ke dashboard
        if ($user) {
            return view('pages.admin.profile.index')->withUser($user);
        } else {
            return redirect()->back();
        }
    }


    public function edit()
    {
        // jika ada id auth user yang di parsing ke view edit profile maka tampilkan view edit, jika tidak redirect kembali
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('pages.admin.profile.edit')->withUser($user);
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        // ambil id auth user
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (Auth::user()->name === $request['name']) {
                $request->validate([
                    'name' => 'required|max:50',
                    'email' => 'required|unique:users|max:50'
                ]);
            }

            // Simpan data yang di input user kemudian redirect ke view index profile dengan alert sukses.
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();

            Session()->flash('record_update','Kategori Berhasil Di Update');
            return redirect()->route('profile-index', $user->id)->with('status', 'Profile Berhasil Diupdate');
        } else {
            return redirect()->back();
        }
    }
}
