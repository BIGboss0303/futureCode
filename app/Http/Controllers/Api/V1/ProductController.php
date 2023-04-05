<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return new ProductCollection(Product::get()->where('category_id',$id));
        // return Product::get()->where('category_id',$id);
    }
    /**
     * Display the specified resource.
     */
    public function show($category_id,$id)
    {

        return Product::get()->where('category_id',$category_id)->where('id',$id);
    }
    public function store($category_id,Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:categories',
            'company'=>'required',
            'description'=>'required',
            'price'=>'required',
            'amount'=>'required'
        ]);
        $validated['category_id']=$category_id;
        Product::create($validated);
    }
    public function update($category_id,$id,Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:categories',
            'company'=>'required',
            'description'=>'required',
            'price'=>'required',
            'amount'=>'required'
        ]);
        $validated['category_id']=$category_id;
        Product::where('id',$id)->update($validated);
    }
    public function destroy($category_id,$id)
    {
        Product::destroy($id);
    }

}