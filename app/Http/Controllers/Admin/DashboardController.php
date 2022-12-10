<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function users()
    {
        $user=User::all();
        return view('admin.users.index',compact('user'));
        
    }
    public function admin_dashboard()
    {
        return view('admin.index');
    }
}
