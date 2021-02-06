<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return view('admin');
    }
}
