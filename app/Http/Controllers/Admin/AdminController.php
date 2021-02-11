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
        $adminDetails = Auth::guard('admin')->user();

        return view('admin.admin_dashboard', compact('adminDetails'));
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

    public function updateCurrentPassword(Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        //dd($adminDetails->toArray());
        if ($request->isMethod('post')) {
            $data = $request->all();
            // print_r($data); die;
            // Check if current password is correct
            if (Hash::check($data['admin_current_pwd'], $adminDetails->password)) {
                // Check if new and confirm password is matching
                if ($data['admin_new_pwd'] == $data['admin_confirm_pwd']) {
                    // Update new password in database
                    Admin::where('id', $adminDetails->id)->update(['password' => bcrypt($data['admin_new_pwd'])]);

                    Session::flash('success_message','Şifre başarıyla değiştirildi.');
                    //return redirect(route('admin.settings'))->with('status', 'Şifre başarıyla değiştirildi.');
                    return redirect(route('admin.settings'));
                } else {


                    Session::flash('error_message', 'Parola doğrulaması doğru değil.');
                    //return redirect()->back()->with('error_message','Mevcut parola geçerli değildir.');
                    return redirect()->back();
                }

            } else {
                Session::flash('error_message', 'Mevcut parola geçerli değildir.');
                return redirect()->back();
            }
        }

        return view('admin.admin_settings', compact('adminDetails'));
    }

    public function checkConfirmPassword(Request $request)
    {
        $data = $request->all();
        //echo '<pre>'; print_r($data); die;
        if ($data['admin_new_pwd'] === $data['admin_confirm_pwd']) {
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

    public function checkCurrentPassword(Request $request)
    {
        $adminDetails = Auth::guard('admin')->user();
        $data = $request->all();
        //echo '<pre>'; print_r($data); die;
        if (Hash::check($data['admin_current_pwd'], $adminDetails->password)) {
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
