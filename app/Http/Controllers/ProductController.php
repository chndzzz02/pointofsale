<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category', 'user');
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(12);
        $categories = Category::all();
        return view('products.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->q.'%')->take(5)->get();
        return response()->json($products);
    }
}