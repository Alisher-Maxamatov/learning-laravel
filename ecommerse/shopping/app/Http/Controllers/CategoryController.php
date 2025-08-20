<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::withCount('products')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function editCategory(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:categories,name'
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        Category::create($validated);
        return redirect()->route('admin.categories')->with('success', "Kategoriya qo\'shildi");
    }

    public function updateCategory(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|unique:categories,name'
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        $category->update($validated);
        return redirect()->route('admin.categories')->with('success', "Kategoriya yangilandi");
    }

    public function deleteCategory(Category $category)
    {
        if ($category->products()->count() > 0) {
            return back()->with('error', "Bu kategoriyada mahsulotlar bor");
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Kategoriya o\'chirildi');
    }
}
