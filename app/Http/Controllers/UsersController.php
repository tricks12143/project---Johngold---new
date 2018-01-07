<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->input('cpassword') == $request->input('password')){
            $users = User::where('name', $request->input('name'))->get();
            if(count($users) < 1){
                $users1 = User::where('email', $request->input('email'))->get();
                if(count($users1) < 1){
                    $data = $request->only('lname', 'fname', 'mname', 'name', 'email', 'password');
                    $data['password'] = bcrypt($data['password']);
                    $user = User::create($data);
                    //if($user){
                    //    \Auth::login($user);   
                    //}
                    return redirect()->route('login');
                }
                else{
                    session()->put('reg_lname', $request->input('lname'));
                    session()->put('reg_fname', $request->input('fname'));
                    session()->put('reg_mname', $request->input('mname'));
                    session()->put('reg_email', $request->input('email'));
                    session()->put('reg_username', $request->input('name'));
                    return back()->with('info', 'Email if already in use.');
                }
                
            }
            else{
                session()->put('reg_lname', $request->input('lname'));
                session()->put('reg_fname', $request->input('fname'));
                session()->put('reg_mname', $request->input('mname'));
                session()->put('reg_email', $request->input('email'));
                session()->put('reg_username', $request->input('name'));
                return back()->with('info', 'Username already exists.');
            }
        }
        else{
            session()->put('reg_lname', $request->input('lname'));
            session()->put('reg_fname', $request->input('fname'));
            session()->put('reg_mname', $request->input('mname'));
            session()->put('reg_email', $request->input('email'));
            session()->put('reg_username', $request->input('name'));
            return back()->with('info', 'Password does not match.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(){
        return view('admin.home');
    }
}
