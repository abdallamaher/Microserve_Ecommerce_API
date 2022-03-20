<?php

namespace App\Http\Controllers;

use App\Http\Resources\CateogryResource;
use App\Models\Category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CateogryResource
     */
    public function index()
    {
        $categories = Category::all();
        return new CateogryResource($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecategoryRequest  $request
     * @return CateogryResource
     */
    public function store(StorecategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new CateogryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response | CateogryResource
     */
    public function show($id)
    {
        $category = category::find($id);

        if($category === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }

        return new CateogryResource($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecategoryRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecategoryRequest $request, $id)
    {

        $category = Category::find($id);

        if($category === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }

        $category->update($request->all());
        return new CateogryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if($category === null)
        {
            return response([
                'message' => trans('data.null_entity'),
            ], 422);
        }

        $category->delete();

        return response([
            'status' => 'success',
            'message' => trans('data.cat_del'),
        ], 200);
    }
}
