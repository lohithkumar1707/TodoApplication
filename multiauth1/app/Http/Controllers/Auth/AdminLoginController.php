<?php

namespace App\Http\Controllers\Auth;

use Illuminate\http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
