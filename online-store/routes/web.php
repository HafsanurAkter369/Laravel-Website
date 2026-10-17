<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Models\Order;
use App\Models\Product;

// Home page
Route::get('/', function () {
    $featured = Product::orderBy('id')->take(3)->get();

    return view('home', compact('featured'));
})->name('home');

// All products / Shop page
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

// Product details
Route::get('/products/{id}', function ($id) {
    $product = Product::findOrFail($id);

    return view('products.show', compact('product'));
})->name('products.show');

// About page
Route::view('/about', 'about')->name('about');

// Contact page
Route::view('/contact', 'contact')->name('contact');

// Add product to cart
Route::post('/cart/add/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'quantity' => [
            'required',
            'integer',
            'min:1',
            'max:' . $product->stock,
        ],
    ]);

    $quantity = (int) $validated['quantity'];
    $cart = session()->get('cart', []);

    $currentQuantity = $cart[$id]['quantity'] ?? 0;
    $newQuantity = $currentQuantity + $quantity;

    if ($newQuantity > $product->stock) {
        return redirect()->back()->withErrors([
            'quantity' => 'Not enough stock available.',
        ]);
    }

    $cart[$id] = [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => $newQuantity,
    ];

    session()->put('cart', $cart);

    return redirect('/cart')->with(
        'success',
        'Product added to cart!'
    );
})->name('cart.add');

// Shopping cart page
Route::get('/cart', function () {
    $cart = session()->get('cart', []);

    $total = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    return view('cart.index', compact('cart', 'total'));
})->name('cart.index');

// Update product quantity in cart
Route::post('/cart/update/{id}', function (Request $request, $id) {
    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        return redirect('/cart')->withErrors([
            'cart' => 'This product is not in your cart.',
        ]);
    }

    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'quantity' => [
            'required',
            'integer',
            'min:1',
            'max:' . $product->stock,
        ],
    ]);

    $cart[$id]['quantity'] = (int) $validated['quantity'];

    session()->put('cart', $cart);

    return redirect('/cart')->with('success', 'Cart updated!');
})->name('cart.update');

// Remove product from cart
Route::post('/cart/remove/{id}', function ($id) {
    $cart = session()->get('cart', []);

    unset($cart[$id]);

    session()->put('cart', $cart);

    return redirect('/cart')->with(
        'success',
        'Product removed from cart.'
    );
})->name('cart.remove');

// Checkout page
Route::get('/checkout', function () {
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect('/cart')->withErrors([
            'cart' => 'Your cart is empty.',
        ]);
    }

    $total = collect($cart)->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });

    return view('checkout', compact('cart', 'total'));
})->name('checkout.index');

// Place the order
Route::post('/checkout', function (Request $request) {
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect('/cart')->withErrors([
            'cart' => 'Your cart is empty.',
        ]);
    }

    $validated = $request->validate([
        'customer_name' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:30'],
        'address' => ['required', 'string', 'max:1000'],
    ]);

    // Check price and stock again from the database
    $lines = [];
    $total = 0;

    foreach ($cart as $item) {
        $product = Product::find($item['id']);

        if (!$product) {
            return redirect('/cart')->withErrors([
                'cart' => $item['name'] . ' is no longer available.',
            ]);
        }

        if ($item['quantity'] > $product->stock) {
            return redirect('/cart')->withErrors([
                'cart' => 'Not enough stock for ' . $product->name . '.',
            ]);
        }

        $lines[] = [
            'product' => $product,
            'quantity' => (int) $item['quantity'],
        ];

        $total += $product->price * $item['quantity'];
    }

    $order = DB::transaction(function () use ($validated, $lines, $total) {
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($lines as $line) {
            $order->items()->create([
                'product_id' => $line['product']->id,
                'product_name' => $line['product']->name,
                'price' => $line['product']->price,
                'quantity' => $line['quantity'],
            ]);

            $line['product']->decrement('stock', $line['quantity']);
        }

        return $order;
    });

    session()->forget('cart');
    session()->put('last_order_id', $order->id);

    return redirect('/order/success/' . $order->id);
})->name('checkout.store');

// Order success page (only for the person who just ordered)
Route::get('/order/success/{id}', function ($id) {
    abort_unless((int) session('last_order_id') === (int) $id, 404);

    $order = Order::with('items')->findOrFail($id);

    return view('order-success', compact('order'));
})->name('order.success');
// Category page
Route::get('/category/{category}', function ($category) {
    $products = \App\Models\Product::whereRaw('LOWER(category) = ?', [strtolower($category)])
        ->orderBy('id')
        ->get();

    // Show the category name exactly as saved in the database
    $category = $products->first()->category ?? $category;

    return view('category', compact('category', 'products'));
})->name('category.show');
