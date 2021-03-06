<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    protected $redirectTo = '/local';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index(){
        return view('admin.login');
    }
    public function authenticate(Request $request){
        $creds = $request->only(['email', 'password']);
        $validator = Validator::make($creds,[
            'email'=>['required', 'string', 'email', 'max:200'],
            'password'=>['required', 'string','min:4']
        ]);

        if($validator->fails()){
            return redirect()->route('login')->with('warning', 'E-mail e/ou senha inválidos!')->withInput()->withErrors($validator);
        }
        if(Auth::attempt($creds)){
            return redirect()->route('local.list');
        }else{
            return redirect()->route('login')->with('warning', 'E-mail e/ou senha inválidos!')->withInput()->withErrors($validator);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
