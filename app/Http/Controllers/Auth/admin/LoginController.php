<?php

namespace App\Http\Controllers\Auth\admin;
use App\Models\Admin;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo ='/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        //$this->middleware('guest:customer')->except('logout');
    }
    public function showAdminLoginForm()
    {
        return view('auth.login',['url'=>'admin']);
        
    }
    public function adminLogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
            
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    //Customers Login forms
    public function showCustomerLoginForm()
    {
        return view('auth.login',['url'=>'customer']);
    }
    public function customerLogin(Request $request)
    {
        $credential=['email'=>$request->email,'password'=>$request->password];
        
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            //dd($credential);
            return redirect()->intended('/customer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
