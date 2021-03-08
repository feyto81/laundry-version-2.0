<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Dashboard";
        $data['page_sub_title'] = "Dashboard";
        $data['outlet'] = Outlet::all()->count();
        return view('admin.dashboard.index', $data);
    }
}
