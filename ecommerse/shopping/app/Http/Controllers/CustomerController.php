<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Product::with('category');

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
        $products = $query->latest()->paginate(12);
        return view('customer.products', compact('products', 'categories'));
    }


    public function placeOrder(Product $product)
    {
        $order = Order::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'status' => 'pending',
        ]);
        return back()->with('success', 'Buyurtma berildi');
    }

    public function myOrders()
    {
        $orders = Order::with('product.category')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('customer.orders', compact('orders'));
    }


    public function show(Request $request)
    {
        return view('customer.index');
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
