<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function dashboard()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.index', compact('products'));
    }

    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jgp,png,jpeg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        Product::create($validated);
        return redirect()->route('admin.dashboard')->with('success', "Mahsulot muvaffaqiyatli qo\'shildi");
    }

    public function editProduct(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
        $product->update($validated);
        return redirect()->route('admin.dashboard')->with('success', "Mahsulot muvaffaqiyatli yangilandi");
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Mahsulot muvaffaqiyatli o\'chirildi');
    }

    public function orders()
    {
        $orders = Order::with(['user', 'product'])->latest()->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,shipped'
        ]);
        $order->update([
            'status' => $request->input('status')
        ]);
        return back()->with('success', 'Buyurtma statusi yangilandi');
    }
    public function export()
    {
        Excel::download(new ProductsExport, 'products.xlsx');


        return redirect(route('admin.products.create'))->with('succes', 'export qilindi');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        Excel::import(new ProductsImport, $request->file('file'));
        return redirect(route('admin.products.create'))->with('success', 'Excel faylidan mahsulotlar import qilindi');
    }
}
