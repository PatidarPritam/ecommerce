<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        // Logic to add the product to the cart
        $cartItem = Cart::where('product_id', $product->id)->first();

        if ($cartItem) {
            // Increment quantity if the product is already in the cart
            $cartItem->increment('quantity');
        } else {
            // Add new item to cart if it's not already in the cart
            Cart::create([
                'product_id' => $product->id,
                'quantity' => 1, // Initial quantity
            ]);
        }

            
        flash('Product added to cart successfully.');

     
        return redirect()->route('cart.show');

  
    }

    public function show()
    {
        $cartItems = Cart::with('product')->get(); // Eager load product details
        //When you use Cart::with('product')->get(), 
        //'product' refers to the product() method in the Cart model  public function product().
       // $cartItems = Cart::all();  // but above used for relation
        return view('products.cart', compact('cartItems'));
    }

    public function removeFromCart(Cart $cartItem)
    {
        $cartItem->delete();
         flash('Product removed from cart.');
        return redirect()->route('cart.show');
    }

    public function clearCart()
    {
        Cart::truncate(); // Remove all items from the cart

        flash('Cart cleared.');
        return redirect()->route('cart.show');
    }
}
