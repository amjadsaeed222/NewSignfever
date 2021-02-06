<?php

namespace App\Http\Controllers\Auth\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboard extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    public function index()
    {
        return view('customer');
    }
}
