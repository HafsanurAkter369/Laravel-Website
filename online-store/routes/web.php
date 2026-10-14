<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
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