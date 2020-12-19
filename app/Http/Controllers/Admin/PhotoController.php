<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function photo($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.profile.photo', ['user' => $user]);
    }

    public function update_photo(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user) {
            if (request()->hasFile('photo')) {
                $photouploaded = request()->file('photo');
                $photoname = time() . '.' . $photouploaded->getClientOriginalExtension();
                $photopath = public_path('/images/');
                $photouploaded->move($photopath, $photoname);

                $user->photo = public_path('/images/');
                $user->photo = '/images/' . $photoname;
                $user->update();
                // dd($photoname);
            }

            Session()->flash('record_update','Photo Berhasil Di Update');
            return redirect()->route('profile-photo', $user->id);
        }
    }
}
