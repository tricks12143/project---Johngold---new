<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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


    public function login(){
        \Auth::logout();
        return view('login');
    }

    public function handleLogin(Request $request){
        $stat = "";
        $data = $request->only('name', 'password');
        session()->put('tempuser', $request->input('name'));
        if(\Auth::attempt($data)){
            $users = User::where('id', \Auth::user()->id)->get();
            if(count($users) > 0){
                foreach ($users as $user) {
                    $stat = $user->stat;
                }
            }
            if($stat == "active"){
                $datas = array(
                'ol_stat'=> 'Offline'
                );
                User::where('id', \Auth::user()->id)
                ->update($datas);
                return redirect()->intended('dashboard');
            }
            else if(empty($stat)){
                \Auth::logout();
                return back()->with('info', 'Good day, Its seems that your account is still under evaluation.');
            }
            session()->forget('tempuser');
        }
        else{
            return back()->with('info', 'Invalid Username and Password.');
        }
    }

    public function logout(){
        $datas = array(
                'ol_stat'=> 'Offline'
                );
        User::where('id', \Auth::user()->id)
        ->update($datas);
        \Auth::logout();
        return redirect()->route('login');
    }
}
