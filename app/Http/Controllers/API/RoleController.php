<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * @OA\Get(
     *      path="/roles",
     *      operationId ="rolesAll",
     *      tags={"Roles"},
     *      summary = "Fetch all the roles",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return response()->json($role,200);
    }

    /**
     * @OA\Post(
     *      path="/roles",
     *      operationId ="addRole",
     *      tags={"Roles"},
     *      summary = "Add a role",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->role = $request->input('role');
        $role->save();
    }


    /**
     * @OA\Delete(
     *      path="/roles/{id}",
     *      operationId ="deleteRole",
     *      tags={"Roles"},
     *      summary = "Delete role",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('role_id',$id);
        $role->delete();

        return response()->json('deleted');
    }
}
