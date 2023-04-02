<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;

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

}