<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LandingPageController extends Controller
{
    public function index(){
        $user = User::first();
        if($user == null){
            return view('Home.superAdminCreate');
        }
        else return view('welcome');
    }
}
