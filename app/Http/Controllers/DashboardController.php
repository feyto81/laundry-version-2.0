<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Dashboard";
        $data['page_sub_title'] = "Dashboard";
        $data['outlet'] = Outlet::all()->count();
        $data['member'] = Member::all()->count();
        $data['paket'] = Paket::all()->count();
        $data['transaction'] = Transaction::all()->count();
        $data['user'] = User::all()->count();
        return view('admin.dashboard.index', $data);
    }
}
