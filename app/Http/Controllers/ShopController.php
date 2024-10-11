<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        $categories = Category::withCount('products')->orderBy('created_at', 'DESC')->take(5)->get();
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('shop', compact('categories', 'products'));
    }

    public function productDetail($product_slug) {
        $products = Product::where('slug', $product_slug)->first();
        $relatedProducts = Product::where('slug','<>',$product_slug)->get()->take(5);
        return view('product-detail', compact('products', 'relatedProducts'));
    }
}
