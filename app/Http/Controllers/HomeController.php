<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $users = User::where('id', '!=', $logged_user_id)->Paginate(4);
        $logged_user = Auth::user()->name;
        $total_user =  User::count();
        return view('admin\user\users', compact('users', 'logged_user', 'total_user'));
        
    }
}
