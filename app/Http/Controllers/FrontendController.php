<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_Product_Details;
use App\Models\ProductThumbnail;
use Illuminate\Http\Request;
use PDF;
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

    public function invoice($order_id)
    {
        $order = Order::where('id', $order_id)->first();
        return view('frontend.invoice', [
            'order' => $order,
        ]);
    }

    public function invoice_download($order_id){

        $order = Order::find($order_id);
        // return view('frontend.invoice-pdf', [
        //     'order' => $order,
        // ]);
        
        
        $pdf = PDF::loadView('user.invoice-pdf', [
            'order' =>   $order,
        ]);

        return $pdf->download('invoice.pdf');
    }
    public function review_post(Request $request){
 
        Order_Product_Details::where('user_id', $request->user_id)->where('product_id', $request->product_id)->update([
            'star' => $request->star,
            'review' => $request->massage,
        ]);
        return back();
    }

}
