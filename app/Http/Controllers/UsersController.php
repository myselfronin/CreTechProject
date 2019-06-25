<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function store()
    {
        //post user
    }

    public function show($id)
    {
        //show user
    }

    public function update($id)
    {
        //update function
    }

    public function destroy($id)
    {
        //delete user
    }
}
