<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Account\RegisterRequest;
use App\Mail\ActivationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where(function ($q) use ($data) {
            return $q
                ->orWhere('email', $data['email'])
                ->orWhere('name', $data['email']);
        })->first();

        if (!$user) {
            toastr('Email və ya şifrə yanlışdır', 'error');
            return redirect()->back();
        }

        if ($user->active == 0) {
            toastr('Daxil olmaq üçün hesabınızı təsdiqləməlisiniz', 'warning');
            return redirect()->back()->with('resend_mail', 'Təsdiqləmə mesajı göndərin');
        }

        $authAttempt = Auth::attempt($data, true);
        if (!$authAttempt) {
            toastr('Email və ya şifrə yanlışdır', 'error');
            return redirect()->back();
        }
        toastr('Uğurla daxil oldunuz');
        return redirect()->route('home');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::where(['email' => $data['email']])->first();
        if ($user) {
            toastr('Bu istifadəçi artıq mövcuddur', 'error');
            return redirect()->back();
        }

        $data['password'] = Hash::make($data['password']);
        $data['verification_token'] = Str::random(100);
        $user = User::create($data);
        $user->syncRoles(['member']);
        $mail_data = [
            'subject' => 'Hesabınızı təsdiqləyin',
            'verification_token' => $data['verification_token'],
            'text' => 'Hesabınızı təsdiqləmək üçün aşağıdakı <a href="{{ route(\'activate-user\',$data[\'verification_token\']) }}">linkə</a> keçid edin.'
        ];
        Mail::to($data['email'])->send(new ActivationMail($mail_data));

        toastr('Qeydiyyatınız tamamlanmışdır, zəhmət olmasa, mailinizə daxil olaraq hesabınızı təsdiqləyin');
        return redirect()->route('login');
    }

    public function activate_user($token)
    {
        $user = User::where(['verification_token' => $token])->firstOrFail();
        $user->update([
            'active' => 1
        ]);

        toastr('Hesabınız aktivləşdirilmişdir');
        return redirect()->route('login');
    }

    public function resend_email(Request $request)
    {
        $user = User::where(['email' => $request->email])->firstOrFail();
        $verification_token = Str::random(100);
        $user->update([
            'verification_token' => $verification_token,
        ]);

        $mail_data = [
            'subject' => 'Hesabınızı təsdiqləyin',
            'verification_token' => $verification_token,
            'text' => 'Hesabınızı təsdiqləmək üçün aşağıdakı <a href="{{ route(\'activate-user\',$verification_token }}">linkə</a> keçid edin.'
        ];
        Mail::to($request->email)->send(new ActivationMail($mail_data));

        toastr('Təsdiq mesajı mailə göndərildi.');
        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
