<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\FUsers;
use \App\Models\role;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;


class newController extends Controller
{
    public function index(Request $request)
    {
        // $users = FUsers::orderBy("created_at", "desc")->paginate(10);
    
        // $search = $request->search;
        // if ($search) {
        //     $users = FUsers::where(function($query) use ($search) {
        //         $query->where("name", "LIKE", "%" . $search . "%")
        //             ->orWhere("email", "LIKE", "%" . $search . "%");
        //     })->paginate(10);
        // }
    
        // return view("login.new.profiles", compact("users", "search"));
       

        // $users = DB::table("f_users")->join("roles","f_users.role","=","roles.id_role")->select('*')->get();
        // return view("login.new.profiles", compact("users"));
        $usersQuery = DB::table("f_users")
        ->join("roles", "f_users.role", "=", "roles.id_role")
        ->select('*');
    
         $search = $request->search;
        if ($search) {
        $usersQuery->where(function ($query) use ($search) {
            $query->where("f_users.name", "LIKE", "%" . $search . "%")
                ->orWhere("f_users.email", "LIKE", "%" . $search . "%")
                ->orWhere("roles.name_role", "LIKE", "%" . $search . "%");
            });
         }
    
         $users = $usersQuery->orderBy("f_users.created_at", "desc")->paginate(5);
    
        return view("login.new.profiles", compact("users", "search"));
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
        return redirect("/profiles")->with("success","Updated successfuly");
    }

    public function destroy($id){
        $U = FUsers::find($id);
        $U->delete();
        return redirect("/profiles")->with("success","deleted successfuly");
    }

}