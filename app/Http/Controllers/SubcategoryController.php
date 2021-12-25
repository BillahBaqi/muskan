<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $subcategories = Subcategory::latest()->get();
        $total_subcategory = Subcategory::count();
        $trash_subcategories = Subcategory::onlyTrashed()->get();        
        return view('admin.subcategory.index', compact('categories', 'subcategories', 'total_subcategory', 'trash_subcategories'));
    }

    public function insert(SubcategoryRequest $request)
    {
        if (Subcategory::where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()) {
            return back()->with('exist', ' This Subcategory Already Exist!');
        } else {
            Subcategory::insert(
                [
                    'subcategory_name' => $request->subcategory_name,
                    'category_id' => $request->category_id,
                    'created_at' => Carbon::now(),
                ]
            );
            return back()->with('success', $request->subcategory_name . ' added successfully!');
        }
    }

    public function edit($subcategory_id)
    {
        $edit_category_id = Subcategory::where('id', $subcategory_id)->pluck('category_id');
        $categories = Category::where('id', '!=', $edit_category_id)->get();
        $subcategory_all = Subcategory::where('id', $subcategory_id)->first();
        $subcategories = Subcategory::latest()->get();
        $total_subcategory = Subcategory::count();
        $trash_subcategories = Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.edit', compact('categories', 'subcategories', 'total_subcategory', 'trash_subcategories', 'subcategory_all'));
    }

    public function update(SubcategoryRequest $request, $subcategory_id)
    {

        Subcategory::find($subcategory_id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
        ]);

        return redirect('admin/subcategory')->with('update', 'Product Added successfully!');
    }


    function delete($subcategory_id)
    {
        Subcategory::find($subcategory_id)->delete();
        return back()->with('delete', ' Deleted successfully!');
    }

    function restore($trash_subcategory_id)
    {
        Subcategory::withTrashed()->find($trash_subcategory_id)->restore();
        return back()->with('restore', ' Restore successfully!');
    }

    function permanentdelete($trash_subcategory_id)
    {
        Subcategory::withTrashed()->find($trash_subcategory_id)->forceDelete();
        return back()->with('permanentdelete', ' Permanently Deleted successfully!');
    }
    function markdelete(Request $Request)
    {
        if ($Request->mark_id) {
            foreach ($Request->mark_id as $mark_single) {
                Subcategory::find($mark_single)->delete();
            }
            return back()->with('delete', 'Marked Item Deleted successfully!');
        } else {
            return back();
        }
    }
    function marktrash(Request $request)
    {
        if ($request->mark_trash_id) {
            if ($request->restore) {
                foreach ($request->mark_trash_id as $mark_single) {
                    Subcategory::withTrashed()->find($mark_single)->restore();
                }
                return back()->with('restore', 'Marked item restore successfully!');
            } else {
                foreach ($request->mark_trash_id as $mark_single) {
                    Subcategory::withTrashed()->find($mark_single)->forceDelete();
                }
                return back()->with('permanentdelete', 'Marked Item Permanently Deleted successfully!');
            }
        } else {
            return back();
        }
    }
}
