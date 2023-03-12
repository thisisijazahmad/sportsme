<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

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
        return view('auth.login');
    }
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){

            $record = DB::table('affiliate')->where('link',$request->reward_token)->first();
            $user_data = DB::table('users')->where('email',$request->email)->first();
            $reward_data = DB::table('reward_detail')->where('link_receiver_id',$user_data->id)->first();
            if(filled($record)){
                if(!filled($reward_data)){
                    $data = [
                        'affilated_table_id'=>$record->id,
                        'link_receiver_id'=>$user_data->id,
                        'amount'=>'5',
                        'no_of_user','1',
                    ];
                DB::table('reward_detail')->insert($data);
                }
            }
        if(Auth::user()->is_admin == 'Admin')
            return redirect()->intended('dashboard');
        else
            return redirect()->intended('home');
        }else{
            dd('iasdjaz');
            return redirect()->intended('login')->with('error','You Enter Invalid Credentials');
        }
    }

    public function logout()
    {
            Auth::logout();
            return redirect('/login');
    }
}
