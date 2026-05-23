<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index() {
        $cart = session()->get('cart', []);
        if (empty($cart)) return redirect()->route('cart.index');
        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request) {
        $request->validate([
            'address' => 'required|string|min:5',
            'payment_method' => 'required|in:cod,transfer'
        ]);
        
        $cart = session()->get('cart');
        if (empty($cart)) return redirect()->route('cart.index');
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => auth()->id(),
            'total_price' => $total,
            'status' => 'pending', // status awal pending, nanti diupdate admin/seller
            'address' => $request->address,
            'payment_method' => $request->payment_method // 'cod' atau 'transfer'
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
            \App\Models\Product::find($item['id'])->decrement('stock', $item['quantity']);
        }

        session()->forget('cart');
        return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat!');
    }

    // Tidak perlu method success lagi
}