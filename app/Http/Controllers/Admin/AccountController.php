<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where(['email' => $data['email']])->whereHas('roles', function ($q) {
            return $q->whereIn('name', ['admin', 'superadmin']);
        })->first();
        if (!$user) {
            toastr('Email və ya şifrə yanlışdır', 'error');
            return redirect()->back();
        }

        $authAttempt = Auth::attempt($data, true);
        if (!$authAttempt) {
            toastr('Email və ya şifrə yanlışdır', 'error');
            return redirect()->back();
        }
        return redirect()->route('dashboard');
    }
}
