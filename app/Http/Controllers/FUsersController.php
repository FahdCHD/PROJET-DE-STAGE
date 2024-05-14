<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FUsers;
use Illuminate\Support\Facades\Hash;

class FUsersController extends Controller
{

    public function edit(){
        $information = FUsers::findOrFail(auth()->user()->id);
        return view("/login.edit",compact('information'));
    }
    // public function update(Request $request, FUsers $fUsers){
        // $request->validate([
        //     "name"=> "required|min:3|max:30",
        //     "email" => "required|email",
        //     "password"=> "required|min:5|max:50|confirmed",
        // ]);
    //     $formFields = [
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "role" => "5",
    //         "password" => Hash::make($request->password),
    //     ];
    //     $user = auth()->user();

    //     $user->update($formFields);
        
    //     $user_role = auth()->user()->role;



        // if($user_role==1){
        //  return redirect("/superadmin");
        // }
        // if($user_role==2){
        //  return redirect("/admin");
        // }
        // if($user_role==3){
        //  return redirect("/dephead");
        // }
        // if($user_role==4){
        //  return redirect("/staff");
        // }
        // if($user_role==5){
        //  return redirect("/client");
        // }   
    // }
    public function update(Request $request, $id){
        $request->validate([
            "name"=> "required|min:3|max:30",
            "email" => "required|email",
            "password"=> "required|min:5|max:50|confirmed",
        ]);
        $information = FUsers::findOrFail($id);
        $information->name = $request->name;
        $information->email = $request->email;
        $information->password = Hash::make($request->password);

        $information->save();
        $user_role = auth()->user()->role;

        if($user_role==1){
            return redirect("/superadmin");
           }
           if($user_role==2){
            return redirect("/admin");
           }
           if($user_role==3){
            return redirect("/dephead");
           }
           if($user_role==4){
            return redirect("/staff");
           }
           if($user_role==5){
            return redirect("/client");
           }   
    }


    public function superadmin(){
            return view("/superadmin");
    }
    public function admin(){
        return view("/admin");
    }
    public function departmenthead(){
        return view("/dephead");
    }
    public function staff(){
        return view("/staff");
    }
    public function client(){
        return view("/client");
    }
}
