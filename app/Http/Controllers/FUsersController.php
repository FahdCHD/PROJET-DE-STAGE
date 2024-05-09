<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FUsersController extends Controller
{
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
