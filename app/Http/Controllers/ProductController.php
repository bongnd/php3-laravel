<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController 
{
    /**
     * Hiển thị danh sách sản phẩm (phân trang 10 bản ghi).
     */
    public function index()
    {
        $products = Product::with(relations: 'category')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.list', compact('products'));
    }

    /**
     * Hiển thị form tạo sản phẩm.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Lưu sản phẩm mới.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('products', 'public') : 'default.jpg';

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.products.list')->with('success', 'Sản phẩm đã được tạo.');
    }

    /**
     * Hiển thị form chỉnh sửa sản phẩm.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật sản phẩm.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->image && $product->image !== 'default.jpg') {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.products.list')->with('success', 'Sản phẩm đã được cập nhật.');
    }

    /**
     * Xóa mềm sản phẩm.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::disk('public')->delete($product->image);
        }
    
        $product->delete(); // Xóa mềm

        return redirect()->route('admin.products.list')->with('success', 'Sản phẩm đã được xóa.');
    }

    /**
     * Hiển thị danh sách sản phẩm đã xóa mềm.
     */
    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(10);
        return view('admin.products.trashed', compact('products'));
    }

    /**
     * Khôi phục sản phẩm đã xóa mềm.
     */
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore(); // Khôi phục

        return redirect()->route('admin.products.trashed')->with('success', 'Sản phẩm đã được khôi phục.');
    }

    /**
     * Xóa vĩnh viễn sản phẩm.
     */
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        // Xóa ảnh nếu có
        if ($product->image && $product->image !== 'default.jpg') {
            Storage::disk('public')->delete($product->image);
        }

        $product->forceDelete(); // Xóa vĩnh viễn

        return redirect()->route('admin.products.trashed')->with('success', 'Sản phẩm đã bị xóa vĩnh viễn.');
    }
}