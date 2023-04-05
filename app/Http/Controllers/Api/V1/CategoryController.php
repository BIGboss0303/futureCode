<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoryCollection;
use App\Http\Resources\V1\CategoryResource;

class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::all());
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:categories',
        ]);
        Category::create($validated);
    }
    public function update($id,Request $request){
        $validated = $request->validate([
            'name'=>'required',
        ]);
        Category::where('id',$id)->update($validated);
    }
    public function destroy($id)
    {
        Category::destroy($id);
    }
}
