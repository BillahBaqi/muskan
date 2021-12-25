<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }

    public function insert(CouponRequest $request){
        Coupon::insert(
            $request->except('_token')+[
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
    function delete($coupon_id)
    {
        Coupon::find($coupon_id)->Delete();
        return back()->with('delete', ' Deleted successfully!');
    }
}
