<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class newController extends Controller
{
    public function index(){
      //  $users = FUsers::orderBy("created_at","desc")->paginate(10);
      $users = FUsers::orderBy("created_at","desc")->paginate(10);
        return view("login.new.profiles",compact("users"));
    }
    public function edit($id){
        $U = FUsers::find($id);
        return view("login.new.edit",compact("U"));
    }
    public function update(Request $request,$id){
        $U = FUsers::find($id);
        $request->validate([
            "name"=> "required|min:3|max:30",
            "email" => "required|email",
            "password"=> "required|min:5|max:50|confirmed",
        ]);
        $U->name = $request->name;
        $U->email = $request->email;
        $U->password = Hash::make($request->password);
        $U->update();
        return redirect("/profiles/edit/$id")->with("success","Updated successfuly");
    }
}
