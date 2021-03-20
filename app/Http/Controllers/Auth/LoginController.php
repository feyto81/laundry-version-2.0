<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;

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
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('dashboard.index');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',

        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = array($fieldType => $input['username'], 'password' => $input['password']);
        if (auth()->attempt($data)) {
            $username = auth()->user()->username;
            $status = auth()->user()->status;
            $ldate = date('Y-m-d H:i:s');
            $user_id = Auth::user()->id;
            if ($status == 1) {
                if (auth()->user()->hasRole('Administrator')) {
                    \LogActivity::addToLog([
                        'data' => 'User ' . $request->username . ' Login Pada ' . $ldate,
                        'user' => $user_id,
                    ]);
                    return redirect()->route('dashboard.index')->with(['success' => 'Welcome back ' . $username]);
                }
                return redirect()->route('dashboard.index')->with(['success' => 'Welcome back ' . $username]);
            } else {
                Auth::logout();
                Session::flush();
                $this->guard()->logout();
                return redirect()->back()->with(['error' => 'User Not Active']);
            }
            // var_dump($status);
        } else {
            return redirect()->back()->with(['error' => 'Invalid email or password']);
        }
    }

    public function logout(Request $request)
    {


        $username = Auth::user()->name;
        $user_id = Auth::user()->id;
        $ldate = date('Y-m-d H:i:s');
        \LogActivity::addToLog([
            'data' => 'User ' . $username . ' Logout Pada ' . $ldate,
            'user' => $user_id,
        ]);
        Auth::logout();
        Session::flush();
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with(['success' => 'You have successfully logged out']);
    }
}
