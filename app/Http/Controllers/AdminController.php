<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validation = $request->validate([
            "name" => 'required',
            "password" => 'required',
        ]);
        $admin = Admin::where([
            ['name', '=', $request->name],
            ['password', '=', $request->password],
        ])->first();
        if (!$admin) {
            $validation = $request->validate([
                "user" => 'required',
            ], [
                "user.required" => "user doesn't exist"
            ]);
        }
        // return $admin->name;
        session::put('admin', $admin);
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $admin = session::get('admin');
        if ($admin) {
            return view('admin', ["name" => $admin->name]);
        } else {
            return redirect('admin-login');
        }
    }
}
