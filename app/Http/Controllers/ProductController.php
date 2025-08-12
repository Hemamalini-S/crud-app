<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // 1. Display all products
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products.index', compact('products'));
    }

    // 2. Show create form
    public function create()
    {
        return view('products.create');
    }

    // 3. Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'mrp'         => 'required|numeric',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        Product::create([
            'name'        => $request->name,
            'mrp'         => $request->mrp,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    // 4. Show single product
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // 5. Show edit form
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    // 6. Update product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'mrp'         => 'required|numeric',
            'price'       => 'required|numeric',
            'description' => 'required|string',
            'image'       => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        $product = Product::findOrFail($id);

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image && file_exists(public_path('products/' . $product->image))) {
                unlink(public_path('products/' . $product->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
        }

        $product->update([
            'name'        => $request->name,
            'mrp'         => $request->mrp,
            'price'       => $request->price,
            'description' => $request->description,
            'image'       => $imageName,
        ]);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // 7. Delete product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && file_exists(public_path('products/' . $product->image))) {
            unlink(public_path('products/' . $product->image));
        }

        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
   
}


    
