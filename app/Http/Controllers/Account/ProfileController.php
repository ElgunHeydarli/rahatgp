<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('front.account.profile');
    }

    public function update_profile(ProfileRequest $request)
    {
        $data = $request->validated();
        $user = User::find(auth()->id());
        if (!is_null($request->old_password)) {
            if (!Hash::check($request->old_password, $user->password)) {
                toastr('Cari parolunuz yanlışdır', 'error');
                return redirect()->back();
            }

            if (is_null($request->new_password) || $request->new_password != $request->confirm_password) {
                toastr('Parolunuzu təsdiqləyin', 'error');
                return redirect()->back();
            }

            $data['password'] = Hash::make($request->new_password);
        }

        $user->update($data);
        toastr('İstifadəçi məlumatı yenilləndi');
        return redirect()->back();
    }
}
