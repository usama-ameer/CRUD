<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index($name){
        if (view()->exists('hello')) {
            return view('hello',['name'=>$name]);
        }else{echo "Not Found";}
    }

    

}

