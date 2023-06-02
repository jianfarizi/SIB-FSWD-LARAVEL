<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();


        return view('category.index', compact('categories'));

        return response()->json([
                'success' => true,
                'message' => 'List Data Category',
                'data' => $categories
            ], 200);

    }
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
        $category = Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index');
    }

    public function edit($id){
        $category = category::find($id);

        return view('category.edit', compact('category'));
    }
}
