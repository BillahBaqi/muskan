<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use Image;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        $total_category = Category::count();
        return view('admin.category.index', compact('categories', 'total_category'));
    }

    public function edit($category_id)
    {
        $categories = Category::all();
        $total_category = Category::count();
        $category_all = Category::where('id', $category_id)->first();
        return view('admin.category.edit', compact('categories', 'total_category', 'category_all'));
    }

    public function update(CategoryRequest $request, $category_id)
    {
       
        
        if ($request->category_photo != "" ) {
            
            if (Category::find($category_id)->category_photo != 'default.png') {
                $delete_path = public_path('/uploads/category/' . Category::find($category_id)->category_photo);
                unlink($delete_path);
            }

            $new_category_image = $request->category_photo;
            $extension = $new_category_image->getClientOriginalExtension();
            $new_category_image_name = $category_id . '_' . 'category-img' .  '.' . $extension;
            Image::make($new_category_image)->save(public_path('/uploads/category/' . $new_category_image_name));
            Category::find($category_id)->update([
                'category_name' => $request->category_name,
                'category_photo' => $new_category_image_name,
            ]);
        }
        else {
            Category::find($category_id)->update([
                'category_name' => $request->category_name,
            ]);
        }
        return redirect('admin/category')->with('product_success', 'Product Added successfully!');
    }

    function insert(CategoryRequest $request)
    {
        if ($request->category_photo) {
            $get_id = Category::insertGetId([
                'category_name' => $request->category_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
            $new_category_image = $request->category_photo;
            $extension = $new_category_image->getClientOriginalExtension();
            $new_category_image_name = $get_id . '_' . 'category-img' .  '.' . $extension;
            Image::make($new_category_image)->save(public_path('/uploads/category/' . $new_category_image_name));
            Category::find($get_id)->update([
                'category_photo' => $new_category_image_name,
            ]);
            return back()->with('success', $request->category_name . ' added successfully!');
        }
        else {
            return back();
        }
        
    }

    function delete($category_id){
        $delete_path = public_path('/uploads/category/' . Category::find($category_id)->category_photo);
        unlink($delete_path);
        Category::withTrashed()->find($category_id)->forceDelete();
        return back()->with('delete', ' Deleted successfully!');   
    }

}
