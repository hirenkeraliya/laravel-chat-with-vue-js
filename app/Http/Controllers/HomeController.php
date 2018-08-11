<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * User Login
     *
     * @return json
     **/
    public function login()
    {
        $validatedData = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($validatedData)) {
            $users = User::all();

            return [
                'type' => 'success',
                'data' => $users->toJson(),
            ];
        }

        return [
            'type' => 'error',
            'message' => 'Creadential not match.',
        ];
    }

    /**
     * Check user logged in.
     *
     * @return Json
     **/
    public function checkUserLoggedIn()
    {
        if (Auth::check()) {
            $users = User::all();

            return [
                'type' => 'success',
                'data' => $users->toJson(),
            ];
        }
        return [
            'type' => 'error',
            'message' => 'User not logged in.',
        ];
    }
}
