<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function loadView(){
        $names = ['anil','sam','tonny'];
        return view("users",compact( 'names'));
    }


    function getData(Request $req){

        $req->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

      
	
        
        return $req->input();
    }

    public function index(){
       return DB::select('select * from forms ');
    }

}
