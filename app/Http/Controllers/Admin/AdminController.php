<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function settings(Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        //dd($adminDetails->toArray());
        if ($request->isMethod('post')) {
            $data = $request->all();
        }

        return view('admin.admin_settings', compact('adminDetails'));
    }

    public function updatePassword(Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        //dd($adminDetails->toArray());
        if ($request->isMethod('post')) {
            $data = $request->all();
        }

        return view('admin.admin_settings', compact('adminDetails'));
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();
        $adminPassword = Auth::guard('admin')->user()->password;

        if (Hash::check($data['current_pwd'], $adminPassword)) {
            /*
            $data['isTrue'] = "true";
            echo json_encode($data);
            */
            echo "true";
        } else {
            /*
            $data['isTrue'] = "false";
            echo json_encode($data);
            */
            echo "false";
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'E-posta adresi gereklidir!',
                'email.email' => 'Geçerli bir e-posta adresi gereklidir!',
                'password.required' => 'Parola gereklidir!',
            ];

            $request->validate($rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                Session::flash('error_message', 'Geçersiz Email veya Parola');
                return redirect()->back();
            }
        }

        return view('admin.admin_login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin');
    }


}
