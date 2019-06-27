<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user =  new User;
        $user->name  = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->phone_no =$request->input('phone_no');
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('user_id',$id)->first();
        if(!$user)
        {
            return response()->json(['message' => "User not found"]);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->phone_no =$request->input('phone_no');
        $user->save();

       // return response()->json("done");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('user_id',$id);
        $user->delete();

        return response('Deleted');
    }
}
