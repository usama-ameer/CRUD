<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormController extends Controller
{
    public function index(){

        return view('form');
    }
    public function insert(Request $request){
        $first_name = $request->input('firstName');
        $last_name = $request->input('lastName');
        $email = $request->input('email');
        $body = $request->input('body');
        $data=array('fname'=>$first_name,"lname"=>$last_name,"email"=>$email,"body"=>$body);

        DB::table('forms')->insert($data);
        return redirect('dashboard');
    }

    public function dashboard(){
        $users = DB::select('select * from forms');
        return view('dashboard',['users'=>$users]);
    }

    public function edit($id){
        $user = DB::table('forms')->where('id', $id)->first();
        return view('edituser', compact('user'));
    }




}
