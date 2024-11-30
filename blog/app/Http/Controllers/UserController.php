<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        return view('login-signup.login');
    }

    public function signup()
    {
        return view('login-signup.signup');
    }

    public function signupData(Request $req)
    {
        $req->validate([
            'name' => 'required|regex:/^[a-zA-Z\s]+$/|string',
            'email' => 'required|email|unique:users,email|',
            'phone' => 'required|numeric|digits_between:9,13',
            'password' => 'required|min:6|confirmed',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ]);
        if (!is_dir(public_path('form/img/profile/'))) {
            mkdir(public_path('form/img/profile/'), 0777, true);
        }
        $data = [];
        if ($req->hasFile('img')) {
            $image = $req->file('img');
            $name = $image->getClientOriginalName();
            $imageName = time() . "_" . $name;
            $imagePath = 'form/img/profile/' . $imageName;
            $image->move(public_path('form/img/profile/'), $imageName);
            $data['img'] = $imagePath;
        } else {
            $data['img'] = 'form/img/profile/default.png';
        }
        $data['name'] = $req->name;
        $data['email'] = $req->email;
        $data['phone'] = $req->phone;
        $data['password'] = bcrypt($req->password);

        User::create($data);
        toastr()->success('Registration Compleate');
        return redirect()->route('login');
    }
    public function loginCheck(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::user()->is_admin == 1) {
                toastr()->success('Admin Login');
                return redirect()->route('admin');
            } else {
                session()->flash('success', 'Login successful.');
                return redirect()->route('home');
            }
        } else {
            toastr()->error('Login Failed, chake mail or Password');
            return redirect()->back();
        }
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
