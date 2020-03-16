<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
    $this->validate($request, [
        'email' => 'required|string',
        'password' => 'required|string'
    ]);
    if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1]))
    {
        return redirect()->intended('home');
    }
    return redirect()->back()->with(['error' => 'Password Invalid / Inactive Users']);
    }


}
