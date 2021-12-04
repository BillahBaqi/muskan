<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductThumbnail;
use App\Models\Subcategory;
use Image;
use Carbon\Carbon;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->Paginate(5);
        $total_products = Product::count();
        return view('admin.products.index', compact('products', 'total_products'));
    }

    public function addproduct(){
        $categories = Category::all();
        $subcategories = Subcategory::all();        
        return view('admin.products.insert', compact('categories', 'subcategories',));
    }

    public function insert(ProductRequest $request){
        
        if ($request->product_thumbnail) {
            $product_id = Product::insertGetId([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            $new_product_image = $request->product_photo;
            $extension = $new_product_image->getClientOriginalExtension();
            $new_product_image_name = $product_id . '_' . date('ymd') .  '.' . $extension;
            Image::make($new_product_image)->save(public_path('/uploads/product/' . $new_product_image_name));
            Product::find($product_id)->update([
                'product_photo' => $new_product_image_name,
            ]);


            $start = 1;
            foreach ($request->product_thumbnail as $key => $product_thumbnail) {
                $product_thumbnail_name = $product_id . '-' . $start . '_' . date('ymd') . '.' . $product_thumbnail->getClientOriginalExtension();
                Image::make($product_thumbnail)->save(public_path('/uploads/product/thumbnails/' . $product_thumbnail_name));
                ProductThumbnail::insert([
                    'product_id' => $product_id,
                    'product_thumbnail' => $product_thumbnail_name,
                ]);
                $start++;
            }

            return redirect('admin/products')->with('product_success', 'Product Added successfully!');

        }

        else {
            $product_id = Product::insertGetId([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            $new_product_image = $request->product_photo;
            $extension = $new_product_image->getClientOriginalExtension();
            $new_product_image_name = $product_id . '_' . date('ymd') .  '.' . $extension;
            Image::make($new_product_image)->save(public_path('/uploads/product/' . $new_product_image_name));
            Product::find($product_id)->update([
                'product_photo' => $new_product_image_name,
            ]);            

            return redirect('admin/products')->with('product_success', 'Product Added successfully!');
        }

    }

    public function update(Request $request, $product_id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required | integer',
            'quantity' => 'required | integer',
            'product_photo_update' => 'image',
        ]);
                
        if ($request->product_photo_update &&  $request->product_thumbnail) 
        {
            Product::find($product_id)->update([                
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
            $delete_path = public_path('/uploads/product/' . Product::find($product_id)->product_photo);
            unlink($delete_path);

            $new_product_image = $request->product_photo_update;
            $extension = $new_product_image->getClientOriginalExtension();
            $new_product_image_name = $product_id . '_' . date('ymd') .  '.' . $extension;
            Image::make($new_product_image)->save(public_path('/uploads/product/' . $new_product_image_name));
            Product::find($product_id)->update([
                'product_photo' => $new_product_image_name,
            ]);

            $start = 1;
            foreach ($request->product_thumbnail as $key => $product_thumbnail) {
                $randomNumber = random_int(100000, 999999);
                $product_thumbnail_name = $product_id . '-' . $start . '_' . date('ymd') . $randomNumber . '.' . $product_thumbnail->getClientOriginalExtension();
                Image::make($product_thumbnail)->save(public_path('/uploads/product/thumbnails/' . $product_thumbnail_name));
                ProductThumbnail::insert([
                    'product_id' => $product_id,
                    'product_thumbnail' => $product_thumbnail_name,
                ]);
                $start++;
            }

            return back()->with('product_success', 'Product Update successfully!');

        } 
        elseif ($request->product_photo_update) {
            Product::find($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);
                        
            $delete_path = public_path('/uploads/product/' . Product::find($product_id)->product_photo);
            unlink($delete_path);

            $new_product_image = $request->product_photo_update;
            $extension = $new_product_image->getClientOriginalExtension();
            $new_product_image_name = $product_id . '_' . date('ymd') .  '.' . $extension;
            Image::make($new_product_image)->save(public_path('/uploads/product/' . $new_product_image_name));
            Product::find($product_id)->update([
                'product_photo' => $new_product_image_name,
            ]);

            return back()->with('product_success', 'Product Update successfully!');
        } 
        
        
        elseif ($request->product_thumbnail) {
            Product::find($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);

            $start = 1;
            foreach ($request->product_thumbnail as $key => $product_thumbnail) {
                $randomNumber = random_int(100000, 999999);
                $product_thumbnail_name = $product_id . '-' . $start . '_' . date('ymd') . $randomNumber . '.' . $product_thumbnail->getClientOriginalExtension();
                Image::make($product_thumbnail)->save(public_path('/uploads/product/thumbnails/' . $product_thumbnail_name));
                ProductThumbnail::insert([
                    'product_id' => $product_id,
                    'product_thumbnail' => $product_thumbnail_name,
                ]);
                $start++;
            }
            return back()->with('product_success', 'Product Update successfully!');
            // return redirect('admin/products')->with('product_success', 'Product Update successfully!');
        }
        
        else {
            
            Product::find($product_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'quantity' => $request->quantity,
                'created_at' => Carbon::now(),
            ]);

            return back()->with('product_success', 'Product Update successfully!');
        }
    }





    public function edit($product_id)
    {
        $edit_category_id = Product::where('id', $product_id)->pluck('category_id');
        $categories = Category::where('id', '!=', $edit_category_id)->get();
        $edit_subcategory_id = Product::where('id', $product_id)->pluck('subcategory_id');
        $subcategories = Subcategory::where('id', '!=', $edit_subcategory_id)->get();        
        $product_all = Product::where('id', $product_id)->first();
        $thumbnails = ProductThumbnail::where('product_id', $product_id)->get();
        $thumbnails_id = ProductThumbnail::where('product_id', '=' ,$product_id)->pluck('product_id')->first();
        return view('admin.products.edit', compact('product_all', 'categories', 'subcategories', 'thumbnails_id', 'thumbnails'));
    }

    function delete($product_id)
    {
        $delete_path = public_path('/uploads/product/' . Product::find($product_id)->product_photo);
        unlink($delete_path);
        Product::find($product_id)->Delete();
        return back()->with('delete', ' Deleted successfully!');
    }

    function thumbnail_delete($thumbnail_id)
    {
        $delete_path = public_path('/uploads/product/thumbnails/' . ProductThumbnail::find($thumbnail_id)->product_thumbnail);
        unlink($delete_path);
        ProductThumbnail::find($thumbnail_id)->Delete();
        return back()->with('delete', ' Deleted successfully!');
    }
}
