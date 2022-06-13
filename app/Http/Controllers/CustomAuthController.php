<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function registerUser(Request $request){
      
    $request->validate([
        'fname'=>'required|regex:/^[a-zA-Z]+$/u|max:9|min:5',
        'lname'=>'required|regex:/^[a-zA-Z]+$/u|max:9|min:5',
        'email'=>'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
        'password'=>'required',
        
    ]);

    $users = new User();

    $users->name= $request->fname;
    $users->name= $request->lname;
    $users->email= $request->email;
    $users->password=Hash::make( $request->password);
    $result= $users->save();
    if ($result) {
        return back()->with('success','You have registerd successfully');
    }else{
        return back()->with('fail','Something wrong');
    }


    }

    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required',
        ]);

        $user = User::where('email','=',$request->email)->first();
        if ($user) {
           if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId',$user->id);
                return redirect('/list');
           }else {
            return back()->with('fail','Password not Matches');
           }
        }else {
            return back()->with('fail','This Email not registerd');
        }
    }

    public function dashboard(){
        $data =array();
        if (Session::has('loginId')) {
            $data = User::where('id','=',Session::get('loginId'))->first();
        }

        return view('auth.dashboard',compact('data'));
    }

    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');
           return redirect ('login');
        }
    }
}
