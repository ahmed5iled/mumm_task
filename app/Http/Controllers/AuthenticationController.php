<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    /**
     * AuthenticationController constructor.
     */
    public function __construct()
    {
        return $this->middleware('auth')->only(['home']);
    }

    /**
     * Handel the request to return login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginPage()
    {
        return view('admin.login');
    }

    /**
     * Handel the request to login
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->route('home');
        }
        return redirect()->back()->with(['fail' => 'Invalid email or password']);
    }

    /**
     * Handel the request to logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Handel the request to return admin home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        Session::flash('sidebar', 'home');
        if (Auth::check()) {
            return view('admin.index');
        }
        return view('admin.login');

    }

    /**
     * Handel the request to return front home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function frontHome()
    {
        return view('front.index');
    }

}
