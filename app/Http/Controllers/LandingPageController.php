<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class LandingPageController extends Controller
{
    public function index(){
        $user = User::first();
        $roles = Role::all();
        if($user == null) {
            return view('Home.superAdminCreate');
        }
        else return view('welcome')->with('roles',$roles);
    }
}
