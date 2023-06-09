<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->get();

       

        if (Auth::user()->role->name == 'user') {
            return view('product.card', ['products' => $product]);
        } else {
            return view('product.index', ['products' => $product]);
        }
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('product.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
         // ubah nama file
         $imageName = time() . '.' . $request->image->extension();

         // simpan file ke folder public/product
         Storage::putFileAs('public/product', $request->image, $imageName);
        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'brands' => $request->brand,
            'image' => $imageName,
        ]);

        return redirect()->route('product.index');
    }
    
    public function edit($id)
    {
        
        $product = Product::where('id', $id)->with('category')->first();
        
        
        $brands = Brand::all();
        $categories = Category::all();
        
        
        return view('product.edit', compact('product', 'brands', 'categories'));
    }
    
    public function update(Request $request, $id)
    {

        if ($request->hasFile('image') ) {

            $old_image = Product::find($id)->image;
            Storage::delete('public/product'.$old_image);
            // ubah nama file
            $imageName = time() . '.' . $request->image->extension();
    
            // simpan file ke folder public/product
            Storage::putFileAs('public/product', $request->image, $imageName);
           
            $product = Product::find($id);
            
     
            $product->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
                'image' => $imageName,
            ]);
        }else{
            Product::where('id', $id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'brands' => $request->brand,
            ]);
        }
        
       
        return redirect()->route('product.index');
    }
    
    public function destroy($id)
    {
       
        $product = Product::find($id);
        
        
        $product->delete();
        
        
        return redirect()->route('product.index');
    }
}
