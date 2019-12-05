<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('Backend.dashboard')->with('pronum', $pronum);

    }

    public function admins()
    {
        $admins = Admin::get();
        return view('Backend.admins.admins')->with('admins', $admins);
    }
    public function showAdminForm()
    {
        return view('Backend.admins.addadmin');
    }
    public function createAdmin(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "type" => 'required',
            "password" => 'required|min:6',
        ]);

        if ($request->isMethod('post')) {
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone_no = $request->phone;
            $admin->type = $request->type;
            $admin->password = Hash::make($request->password);
            $admin->remember_token = str_random(50);

            $admin->save();

            return redirect()->route('Backend.admins.addAdmin')
                ->with('flash_message_success',
                    'New Admin Created successfully!!! If you wanna see go to your "Admins view" page.');
        }

    }

    //Users Control
    public function users()
    {
        $users = User::get();
        return view('Backend.users.users')->with('users', $users);
    }
}