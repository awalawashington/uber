<?php

namespace App\Http\Controllers\Admins\Admins;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Type $var = null)
    {
        return view('/admins/admin/dashboard', ['admin' => auth('admin')->user()]);
    }
}
