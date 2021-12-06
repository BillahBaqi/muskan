<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_Product_Details;
use App\Models\ProductThumbnail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.index', compact('categories','products'));
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->get();
        return view('frontend.shop', compact('categories', 'products'));
    }

    public function category($category_name)
    {
        $categories = Category::all();        
        $category_id = Category::where('category_name', $category_name)->pluck('id');
        $active_category = $category_name;
        $products = Product::where('category_id', $category_id)->get();
        return view('frontend.category', compact('categories', 'products', 'category_id' , 'active_category'));

    }

    public function details($product_id){
        $categories = Category::all(); //common all products page for navbar
        $product_details = Product::where('id', $product_id)->first();
        $category_id = Product::find($product_id)->category_id;
        $related_product = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->get();
        $thumbnails = ProductThumbnail::where('product_id', $product_id)->get();
        return view('frontend.single', compact('product_details', 'categories', 'related_product', 'thumbnails'));
    }

    public function orders(){
        $orders = Order::where('user_id', Auth::id())->get();        
        $total_order = Order::where('user_id', Auth::id())->count();
        return view('user.orders', [
            'orders' => $orders,
            'total_order' => $total_order,
        ]);
    }

    public function myaccount()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        $orders_id = Order::where('user_id', Auth::id())->first();
        $total_order = Order::where('user_id', Auth::id())->count();
        return view('user.profile', [
            'orders' => $orders,
            'total_order' => $total_order,
        ]);
    }

    public function success(){
        return view('frontend.success');
    }


}
