<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class loginController extends Controller
{
    // show login pages
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {

            $data_admins = admin::where('email', $request->email)->first();
            if ($data_admins) {
                if (Hash::check($request->password, $data_admins->password)) {
                    Auth::guard('admin')->loginUsingId($data_admins->id);
                    return redirect()->route('index');
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Password anda salah, coba yang lain!');
                }
            } else {
                $data_user = User::where('email', $request->email)->first();
                if ($data_user) {
                    if (Hash::check($request->password, $data_user->password)) {
                        Auth::guard('user')->loginUsingId($data_user->id);
                        return redirect()->route('index');
                    } else {
                        return redirect()->back()
                            ->withInput()
                            ->with('error', 'Password anda salah, coba yang lain!');
                    }
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Email dan Password anda salah, coba yang lain!');
                }
            }

            // if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //     return redirect()->route('index');
            // } elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //     return redirect()->route('index');
            // } else {
            //     return redirect()->back()->withInput()->with('error', 'Email dan Password anda salah!');
            // }

            // $data_user = User::where('email', $request->email)->first();

            // if ($data_user) {
            //     Auth::guard('user')->loginUsingId($data->id);
            //     return redirect()->route('index');
            // }

            // $data_admin = admin::where('email', $request->email)->first();

            // if($data_admin) {
            //     Auth::guard('admin')->loginUsingId($data->id);
            //     return redirect()->route('index');
            // }
        }
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->Logout();
            return redirect('/');
        } elseif (Auth::guard('user')->check()) {
            Auth::guard('user')->Logout();
            return redirect('/');
        }
    }
}
