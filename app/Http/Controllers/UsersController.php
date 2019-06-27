<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * @OA\Get(
     *      path="/users",
     *      operationId ="usersAll",
     *      tags={"Users"},
     *      summary = "Fetch all the user",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * @OA\Post(
     *      path="/users",
     *      operationId ="addUser",
     *      tags={"Users"},
     *      summary = "Add a user to Users table",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     */
    public function store(Request $request)
    {
        $user =  new User;
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->get('role_id');
        $user->phone_no =$request->get('phone_no');
        $user->save();

        return response()->json($user) ;


    }
    /**
     * @OA\get(
     *      path="/user/{id}",
     *      operationId ="showUser",
     *      tags={"Users"},
     *      summary = "Show a user",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     */
    public function show($id)
    {

        $user = User::where('user_id',$id)->get();
        return response()->json($user);
    }
    /**
     * @OA\Put(
     *      path="/user/{id}",
     *      operationId ="updateUser",
     *      tags={"Users"},
     *      summary = "Update a user to Users table",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     */
    public function update(Request $request,$id)
    {
        $user = User::where('user_id',$id)->first();
        if(!$user)
        {
            return response()->json(['message' => "User not found"]);
        }
        $user->name = 'updated name';
        $user->email = 'updated email';
        $user->phone_no = '0980';
//        $user->email = $request->get('email');
//        $user->role_id = $request->get('role_id');
//        $user->phone_no =$request->get('phone_no');
        $user->save();

        return response()->json("done");
    }
    /**
     * @OA\Delete(
     *      path="/user/{id}",
     *      operationId ="deleteUser",
     *      tags={"Users"},
     *      summary = "Delete a user to Users table",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     */
    public function destroy($id)
    {
        $user = User::where('user_id',$id);
        $user->delete();

        return response('Deleted');
    }
}
