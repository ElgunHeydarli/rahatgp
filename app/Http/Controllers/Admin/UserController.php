<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('roles', function ($q) {
            return $q->whereIn('name', ['member', 'admin']);
        })->get();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('edit'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        $data['password'] = $user->password;
        if (!is_null($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        toastr('İstifadəçi redaktə olundu');
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return response([
                'message' => 'İstifadəçi silindi',
                'code' => 204
            ]);
        } catch (\Exception $ex) {
            return response([
                'message' => 'Silərkən xəta baş verdi',
                'code' => 500
            ]);
        }
    }
}
