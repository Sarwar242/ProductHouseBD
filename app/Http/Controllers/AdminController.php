<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $req)
    {
        if ($req->isMethod('post'))
        {
            $data= $req->input();
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'],'admin'=>'1']))
            {
                //for protecting

                //Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard');
            }
            else
            {
                return redirect('/admin')->with('flash_message_error', 'Do not try to take tricky way cause you are not an admin or invalid e-mail/password');
                
            }
        }
        return view('admin.admin_login');
    }

     public function reset(Request $req)
    {
        if ($req->isMethod('post'))
        {
            $data= $req->input();
            if(Auth::attempt(['email'=>$data['email'], 'admin'=>'1']))
            {
                //for protecting

                //Session::put('adminSession',$data['email']);
                //return redirect('/admin/dashboard');
                return redirect('/admin/reset')->with('flash_message_success', 'Please check your e-mail. There you will get option for recovering your password.');
            }
            else
            {
                return redirect('/admin/reset')->with('flash_message_error', 'Do not try to take tricky way cause you are not an admin or invalid e-mail/password');
                
            }
        }
        return view('admin.admin_login');
    } 

    public function dashboard()
    {
       /* if(Session::has('adminSession'))
        {

        }
        else
        {
            return redirect('/admin')->with('flash_message_error','Please, at first login to access...');
        } */
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function chkPassword(Request $req)
    {
        $data= $req->all();
        $current_password= $data['current_pwd'];
        $check_password= User::where(['admin'=>'1'])->first();

        if(Hash::check($current_password,$check_password->password))
          {
             echo "true"; die;
          }
         else
         {
             echo "false"; die;
         } 
    }

    public function updtPassword(Request $req)
    {
        if($req->isMethod('post'))
        {
            $data= $req->all();
            $current_password= $data['current_pwd'];
            $check_password= User::where(['email'=> Auth::user()->email])->first();

            if(Hash::check($current_password, $check_password->password))
            {
                $password= bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password'=>$password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password updated successfully!');
            }
            else
            {
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect current password.');
            }
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin')->with('flash_message_success', 'Logged out successfully!');
    }
    
}
