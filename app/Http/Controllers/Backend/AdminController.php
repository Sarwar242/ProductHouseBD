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

            return redirect()->route('admin.addAdmin')
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

    public function profile()
    {
        $id = session('adminId');
        $admin = Admin::find($id);

        return view('Backend.admins.profile')->with('admin', $admin);

    }
    public function editProfile()
    {
        $id = session('adminId');
        $admin = Admin::find($id);

        return view('Backend.admins.edit_profile')->with('admin', $admin);

    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "email" => 'required',
            "type" => 'sometimes',
            "avatar" => 'sometimes|file|image|max:3000',
        ]);

        $id = session('adminId');
        $oldAdmin = Admin::find($id);
        $oldAdmin->name = $request->name;
        $oldAdmin->email = $request->email;
        $oldAdmin->phone_no = $request->phone;
        $oldAdmin->type = $request->type;
        if (request()->hasFile('avatar')) {
            $path = $request->file('avatar')->store('uploads', 'public');
            $oldAdmin->avatar = $path;
        }
        $oldAdmin->save();
        $admin = Admin::find($id);
        return redirect()->route('admin.profile')->with('admin', $admin);

    }
    public function settings()
    {
        return view('Backend.admins.settings');
    }
    public function updatePassword(Request $request)
    {

        $id = session('adminId');
        $admin = Admin::find($id);

        $new2 = Hash::make($request->password_confirmation);
        if (!Hash::check($request->current_pwd, $admin->password)) {

            session()->flash('flash_message_error', 'Current Password is not match! Please input correct one or try to reset password.');
            return redirect()->route('admin.settings')->with('flash_message_error', 'Current Password is not match! Please input correct one or try to reset password.');
        } elseif ($request->password != $request->password_confirmation) {
            session()->flash('flash_message_error', 'Confirm Password mismatched!.');
            return redirect()->route('admin.settings');
        } else {
            $admin->password = $new2;
            $admin->save();
            session()->flash('flash_message_success', 'Your password have been changed successfully!.');

        }
        return redirect()->route('admin.settings')->with('flash_message_success', 'Your password have been changed successfully!.');
    }

}