<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category', 'user')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        $sellers = User::where('role', 'seller')->get();
        return view('admin.products.create', compact('categories', 'sellers'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required', // diubah agar bisa menerima string berformat ribuan
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|exists:users,id'
        ]);

        // Bersihkan harga: hilangkan semua karakter non-digit
        $cleanPrice = preg_replace('/[^0-9]/', '', $request->price);
        $price = (float) $cleanPrice;

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product) {
        $categories = Category::all();
        $sellers = User::where('role', 'seller')->get();
        return view('admin.products.edit', compact('product', 'categories', 'sellers'));
    }

    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'user_id' => 'required|exists:users,id'
        ]);

        $cleanPrice = preg_replace('/[^0-9]/', '', $request->price);
        $price = (float) $cleanPrice;

        $data = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $price,
            'stock' => $request->stock,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Produk diperbarui');
    }

    public function destroy(Product $product) {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk dihapus');
    }
}