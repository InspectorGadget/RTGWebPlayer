<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $buildQuery = [
            'email' => strtolower($request->input('email')),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($buildQuery)) {
            Session::put('email', $buildQuery['email']);
            return redirect()->intended(route('dashboard'));
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function register(Request $request) {

    }

    public function getAllAdmins() {
        $result = DB::table(env("DB_ADMIN"))
            ->select('id')
            ->get()
            ->toArray();

        return (array) $result;
    }

    public function getAdminData() {
        $result = DB::table(env("DB_ADMIN"))
            ->select('id', 'email')
            ->first();

        return $result;
    }

    public function logout() {
        Session::remove('email');
        return redirect()->intended(route('login'));
    }

}
