<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProductResource
     */
    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(10);
        return new ProductResource($products);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return ProductResource
     */
    public function store(StoreProductRequest $request)
    {
        $product = $request->all();
        $product['seller_id'] = Auth::id();
        $product = Product::create($product);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response | ProductResource
     */
    public function show($id)
    {
        $product = Product::find($id);

        if($product === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }

        $product['images'] = $product->images;
        $product['categories'] = $product->load('categories:name');

        return new ProductResource($product);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response | ProductResource
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        if($product === null)
        {
            return response([
                'message'=>trans('data.null_entity'),
            ], 422);
        }

        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product === null ){
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => trans('data.prod_del'),
        ], 200);
    }
}
