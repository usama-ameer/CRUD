<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Form;
class MemberController extends Controller
{
    public function list(){
        $data = Form::all();
        return view('list',['members'=>$data]);
    }

    public function trash(){
        $data = Form::onlyTrashed()->get();
        return view('trash',['members'=>$data]);
        }
    public function adddata(Request $req){

        $req->validate([
            'firstName'=>'required|regex:/^[a-zA-Z]+$/u|max:9|',
            'lastName'=>'required|regex:/^[a-zA-Z]+$/u|max:9|',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'body'=>'required',
            'option'=>'required',
            'birthday'=>'required|after_or_equal:2000-01-01',
            'radio'=>'required',
            'option'=>'required',
        ]);
          
       $date =
       
        $member = new Form;
        $member->fname= $req->firstName;
        $member->lname= $req->lastName;
        $member->email= $req->email;
        $member->radio= $req->radio;
        $member->body= $req->body;
        $member->dropdown= $req->dropdown;
        $member->checkbox= $req->option;
        $member->created_at= $req->birthday;
        $member->date= $req->birthday;
        $member->check_in= $req->birthday;
        $member->check_out= $req->birthday;
        
        $member->save();
        return redirect('/list');

    }

    public function editdata($id){
        $now =new Carbon();
        $now->setTimezone('Asia/Karachi');

        $data = Form::find($id);
        return view('edituser',compact('data','now'));
    }

    public function delete($id){
        $data = Form::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Recoard Has been Deletet succesfully'); 
        }
    public function forcedelete($id){
        $data = Form::withTrashed()->find($id);
        $data->forcedelete();
        return redirect()->back()->with('success', 'Recoard Has been Deletet succesfully'); 
        }
    public function restore($id){
        $data = Form::withTrashed()->find($id);
        $data->restore();
        return redirect()->back()->with('success', 'Recoard Has been Restore succesfully'); 
        }

       

    public function update(Request $req){

        $req->validate([
            'firstName'=>'required|regex:/^[a-zA-Z]+$/u|max:9|',
            'lastName'=>'required|regex:/^[a-zA-Z]+$/u|max:9|',
            'email'=>'required|regex:/(.+)@(.+)\.(.+)/i',
            'body'=>'required',
            'option'=>'required',
            'birthday'=>'required|after_or_equal:2000-01-01',
            'radio'=>'required',
            'option'=>'required',
            'checkin'=>'required|after_or_equal:2000-01-01',
        ]);
        $data = Form::find($req->id);
        $data->fname= $req->firstName;
        $data->lname= $req->lastName;
        $data->email= $req->email;
        $data->body= $req->body;
        $data->dropdown= $req->dropdown;
        $data->checkbox= $req->option;
        $data->created_at= $req->birthday;
        $data->check_in= $req->checkin;
        $data->save();
        return redirect('/list');
    }
}
