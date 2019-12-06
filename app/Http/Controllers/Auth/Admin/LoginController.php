<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Backend.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email,
            'password' => $request->password])) {
            $admin = Admin::where('email', '=', $request->email)->first();
            $adminName = $admin->name;
            $adminId = $admin->id;
            session(['adminName' => $adminName, 'adminId' => $adminId]);

            return redirect()->intended(route('homeadmin'));

        } else {
            session()->flash('failed', 'invalid Email or Password!');
            return back();
        }
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        session()->forget(['adminName', 'adminId']);
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

}