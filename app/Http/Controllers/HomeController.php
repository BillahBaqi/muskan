<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Validation\Rules\Exists;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function users()
    {
        $logged_user_id = Auth::id();
        // $users = User::where('id', '!=', $logged_user_id)->simplePaginate(4);
        $users = User::where('id', '!=', $logged_user_id)->where('role', 'USR')->Paginate(15);
        $admins = User::where('id', '!=', $logged_user_id)->where('role', '!=', 'USR')->Paginate(5);
        $logged_user = Auth::user()->name;
        $total_user =  User::count();
        return view('admin\user\users', compact('users', 'logged_user', 'total_user', 'admins'));
        
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'role' => 'required',
        ]);
        if (Auth::user()->role == 'ADM') {
            if (User::where('email', $request->email)->where('role', 'USR')->exists()) 
            {
                User::where('email', $request->email)->update([
                    'role' => $request->role,
                ]);
                return back()->with('success', ' This User Role Updated!');
            }
            elseif(User::where('email', $request->email)->where('role', '!=', 'USR')->exists()){
                return back()->with('exist', ' This User Already Exist!');
            }
            else{
                User::insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                ]);
                return back()->with('success', ' This User Added Successfully!');
            }
        }
        else{
            return back()->with('exist', ' This User Not Access to do this!');
        }

    }
}
