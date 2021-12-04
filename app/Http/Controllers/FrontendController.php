<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ProductThumbnail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

    public function myaccount(){
        return view('user.profile');
    }

    public function success(){
        return view('frontend.success');
    }


}
