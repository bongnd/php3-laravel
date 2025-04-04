<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10); // Sắp xếp theo mới nhất và phân trang
        return view('admin.categories.index', compact('categories'));
    }

    // Hiển thị form tạo danh mục
    public function create()
    {
        return view('admin.categories.create');
    }

    // Lưu danh mục mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được tạo.');
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Cập nhật danh mục
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật.');
    }

    // Xóa danh mục
   
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); // Soft delete
    
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa (soft delete).');
    }
    
public function trashed()
{
    $categories = Category::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
    return view('admin.categories.trashed', compact('categories'));
}

public function restore($id)
{
    $category = Category::onlyTrashed()->findOrFail($id);
    $category->restore();

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được khôi phục.');
}

public function forceDelete($id)
{
    $category = Category::onlyTrashed()->findOrFail($id);
    $category->forceDelete(); // Xóa vĩnh viễn

    return redirect()->route('admin.categories.trashed')->with('success', 'Danh mục đã được xóa vĩnh viễn.');
}
}