<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return response()->json($roles,200);
    }

    public function store(Request $request)
    {
        $role = new Role;
        $role->role = $request->get('name');
        $role->save();

        return redirect()->back();
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
