<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgotpassword(Request $request){
        if(!empty($request->input('hidname'))){
            
            $users = User::where('name', $request->input('hidname'))->get();
            if(count($users) > 0){

                return view('forgotpass', ['users' => $users]);
            }
            else{
                return redirect('/login')->with('info', 'Invalid username');
            }
        }
        else{
            return redirect('/login')->with('info', 'Please Fill up username');
        }
    }

    public function handleforgot(Request $request){
        $users = User::where('id', session()->get('hiduserid'))->get();
        $code = $this->generateRandomString();
        $fname = "";
        if(count($users) > 0){
            foreach($users as $user){
                $fname = $user->fname;
            }
        }
        $data = array(
            'change_code'=> $code
            );
        User::where('id', session()->get('hiduserid'))
        ->update($data);

        $this->sendEmail($fname, $code, $request->input('email'));

        return view('/forgotcode');
    }

    private function sendEmail($fname, $code, $email){
        $to = $email;
        $subject = "Howdy! $fname reset password.";

        $message = "
        <html>
        <head>
        <title>Reset Password</title>
        </head>
        <body>
        <p>Enter this code to reset your password: </p>
        <h3>$code</h3>
        </body>
        </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: noreply@johngold.com';

        mail($to,$subject,$message,$headers);
    }

    private function generateRandomString() {
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function handleforgotsubmit(Request $request){

        $users = User::where('id', session()->get('hiduserid'))
        ->where('change_code', $request->input('code'))
        ->get();
        if(count($users) > 0){
            echo 'success';
        }
        else{
            echo '<div class="alert alert-danger">Invalid code.</div>';
        }

    }

    public function handlepasschange(Request $request){
        if($request->input('pass') == $request->input('cpass')){
            $data = array(
                'password'=>$request->input('pass')
                );
            $data['password'] = bcrypt($data['password']);
            User::where('id', session()->get('hiduserid'))
            ->update($data);
            echo 'success';
        }
        else{
            echo '<div class="alert alert-danger">Password does not match.</div>';
        }
        
    }
}
