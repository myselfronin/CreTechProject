<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     *  @OA\Get(
     *      path="/products",
     *      operationId ="getProducts",
     *      tags={"Product"},
     *      summary = "Fetch all product from database",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      )
     *)
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return response()->json($product);
    }

    /**
     *  @OA\Post(
     *      path="/products",
     *      operationId ="addProduct",
     *      tags={"Users"},
     *      summary = "Add a product",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->product_owned_by = $request->input('product_owned_by');
        $product->amount = $request->input('amount');
        $product->min_credit_amount = $request->input('min_credit_amount');

        $product->save();

        return response()->json('successfull');
    }

    /**
     * @OA\get(
     *      path="/products/{id}",
     *      operationId ="showProduct",
     *      tags={"Product"},
     *      summary = "Show a product detail",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Product not found with that id",
     *      )
     * )
     *
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('product_id', $id)->first();
        if(!$product)
        {
            return response()->json('Product not found',404);
        }

        return response()->json($product,200);
    }

    /**
     *  @OA\Put(
     *      path="/product/{id}",
     *      operationId ="updateProduct",
     *      tags={"Product"},
     *      summary = "Update a product details",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Product not found with that id",
     *      )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::where('product_id',$id)->first();
        if(!$product)
        {
            return response()->json('Product not found',404);
        }

        $product->amount = $request->input('amount');
        $product->min_credit_amount = $request->input('min_credit_amount');

        $product->save();

        return response()->json('updated');
    }

    /**
     *
     * @OA\Delete(
     *      path="/products/{id}",
     *      operationId ="deleteProduct",
     *      tags={"Product"},
     *      summary = "Delete a product from Product table",
     *      @OA\Response(
     *          response="200",
     *          description="Everything is fine",
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Product not found with that id",
     *      )
     * )
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('product_id',$id);
        if(!$product)
        {
            return response()->json('Product not found',404);
        }
        $product->delete();

        return response('Deleted');
    }
}
