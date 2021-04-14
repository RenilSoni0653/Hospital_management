<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class DrLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('doctor.login');
    }

    public function show(\App\Doctor $doctor)
    {
        return view('doctor.profile.index')->with(compact('doctor'));
    }

    public function login()
    {
        $doctor = \App\Doctor::find(1);
        return redirect('/d/'.$doctor->id);
    }
}
