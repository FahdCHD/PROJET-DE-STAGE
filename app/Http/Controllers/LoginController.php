<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use \App\Models\FUsers;


class LoginController extends Controller
{
    public function show(){
        return view("login.show");
    }

    public function login(Request $request){
            $email = $request->email;
            $password = $request->password;
            $credentials = ["email"=>$email,"password"=>$password];
            // if(Auth::attempt($credentials)){

            //     return redirect("");
            // }
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect("/home");
            }else{
                return back()->withErrors(
                    ["email"=> "Email ou Mot de pass incorrect"]
                    )->onlyInput("email");
            }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

    public function create(Request $request){
        return view("ajouter");
    }
    public function store(Request $request){
        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;

        //validation
        $request->validate([
            "name"=> "required"
        ]);
        //insertion
        // FUsers::create([
        //     "name"=> $name,
        //     "email"=> $email,
        //     "password"=> $password,
        // ]);
        FUsers::create($request->post());

        return to_route("login");
    }
}
