<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function homeadmin()
    {
        $products = Product::all();
        $pronum = $products->count();
        return view('admin.dashboard')->with('pronum', $pronum);

    }

    public function admins()
    {
        $admins = Admin::get();
        return view('admin.admins')->with('admins', $admins);
    }
    public function users()
    {
        $users = User::get();
        return view('admin.users')->with('users', $users);
    }
}