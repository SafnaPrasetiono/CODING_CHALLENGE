<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function registerAdmin()
    {
        return view('auth.register-admin');
    }

    public function registerAdminPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|min:4|email|unique:users|unique:admins|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $data = admin::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($data) {
                Auth::guard('admin')->loginUsingId($data->id);
                return redirect()->route('index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function registerUser()
    {
        return view('auth.register-user');
    }

    public function registerUserPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|min:4|email|unique:users|unique:admins|max:255',
            'password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            // $cek_email_sama = admin::where('email', $request->email)->first();

            // if ($cek_email_sama) {
            //     return redirect()->back()
            //     ->withInput()
            //     ->with('error', 'Password anda salah, coba yang lain!');
            // } else {
            $data = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            if ($data) {
                Auth::guard('user')->loginUsingId($data->id);
                return redirect()->route('index');
            } else {
                return redirect()->back();
            }
            // }
        }
    }
}
