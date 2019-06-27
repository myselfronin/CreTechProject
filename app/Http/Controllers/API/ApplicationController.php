<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use Illuminate\Support\Facades\App;

class ApplicationController extends Controller
{
    /**
     * @OA\Get(
     *      path="/applications",
     *      operationId ="getApplications",
     *      tags={"Application"},
     *      summary = "Fetch all application from database",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application = Application::all();

        return response()->json($application);
    }

    /**
     * @OA\Post(
     *      path="/applications",
     *      operationId ="addApplication",
     *      tags={"Application"},
     *      summary = "Add a application to product",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $application = new Application;
        $application->product = $request->get('product');
        $application->user_id = $request->get('user_id');
        $application->save();

        return response()->json($application,200);
     }

    /**
     * @OA\get(
     *      path="/applications/{id}",
     *      operationId ="showApplication",
     *      tags={"Application"},
     *      summary = "Show a application detail",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description = "Application not found",
     *      )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::where('application_id',$id)->first();
        if(!$application)
        {
            return response()->json("No application with that id",404);
        }

        return response()->json($application,200);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * @OA\Delete(
     *      path="/applications/{id}",
     *      operationId ="deleteApplication",
     *      tags={"Application"},
     *      summary = "Delete a application to Application table",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Application with that id not found",
     * )
     * )
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $application = Application::where('application_id', $id)->first();
        if(!$application)
        {
            return response()->json('Application not found',404);
        }
        $application->delete();

        return response()->json('Deleted',200);
    }
}
