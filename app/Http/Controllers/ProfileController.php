<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Validator;
use Image;
use Illuminate\Validation\Rules\Password;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin\profile\index');
    }


    public function profileupdate(ProfileRequest $request)
    {

        $user_id = Auth::id();
        User::find($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return back()->with('success', 'Profile Update Successfully!');
    }
    public function passchange(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()],
        ]);
        if (Hash::check($request->old_password, Auth::user()->password)) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
            ]);
            return back()->with('passchange', 'Password Update Successfully!');
        } else {
            return back()->with('old_pass', 'Old password dose not match!');
        }
        return back();
    }

    public function imagechange(Request $request)
    {
        if ($request->profile_image) {
            $request->validate([
                'profile_image' => 'image',
                'profile_image' => 'file|max:1024',
            ]);
            if (Auth::user()->profile_image != 'default.png') {
                $delete_path = public_path('/uploads/profile/' . Auth::user()->profile_image);
                unlink($delete_path);
            }

            $new_profile_image = $request->profile_image;
            $extension = $new_profile_image->getClientOriginalExtension();
            $new_profile_image_name = Auth::id() . '.' . $extension;
            Image::make($new_profile_image)->save(public_path('/uploads/profile/' . $new_profile_image_name));
            User::find(Auth::id())->update([
                'profile_image' => $new_profile_image_name,
            ]);

            return back()->with('profile_success', 'Profile Image update successfully!');
        }
        return back();
        
    }
}
