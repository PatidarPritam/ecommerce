<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database

    // print_r($products);
        return view('products.index', compact('products'));
    }

    public function view($id){
        $product = Product::find($id);
    //    echo "<pre>";
    //     print_r($product);
    //     echo "</pre>";
       return view('products.productsView', compact('product'));

    }
}
