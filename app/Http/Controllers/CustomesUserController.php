<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomUser;
use Session;

class CustomesUserController extends Controller
{
    public function login(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }

    public function check(Request $request)
    {
        // return $request->input();
        // validate request
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);

        $userInfo = CustomUser::where('email','=',$request->email)->first();

        // return $userInfo;

        if(!$userInfo){
            return back()->with('success','We do not reconigize your email address');
        }else{
            // check password
            if(Hash::check($request->password,$userInfo->password)){
                // $request->session()->put('LoggedUser',$userInfo->id);
                if($userInfo->is_admin=='1'){
                    $request->session()->put('admin_session', $userInfo->id);
                    return redirect('admin/dashboard');
                }else if($userInfo->is_admin=='0'){
                    $request->session()->put('user_session',$userInfo->id);
                    return redirect('user/dashboard');
                }
            }else{
                return back()->with('error','Incorrect Password');
            }
        }
    }


    public function logout(Request $request){
        // if(session()->has('LoggedUser')){
        //     session()->pull('LoggedUser');
        //     return redirect('/');
        $request->session()->flush();

        Auth::logout();

        return redirect('/');
        }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'full_name'=>'required',
            'phone_number'=>'required',
            'email'=>'required|email|unique:custom_users',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required'
        ]);
        // insert data into database
        $user = new CustomUser;
        $user->full_name = $request->full_name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save){
            return back()->with('success','User Register to Avani Nepal');
        }else{
            return back()->with('fail','something went wrong. try again later');
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
}
