<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;

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
        $data['diambil'] = Transaction::where('status', '=', 'diambil')->count();
        $data['baru'] = Transaction::where('status', '=', 'baru')->count();
        $data['proses'] = Transaction::where('status', '=', 'proses')->count();
        $data['selesai'] = Transaction::where('status', '=', 'selesai')->count();
        $data['transaction_list'] = Transaction::latest()->get();
        $data['income'] = DB::table('transaction')->sum('pay_total');
        $tahun = DB::table("transaction")->select(DB::raw('EXTRACT(YEAR FROM date) AS Tahun, SUM(pay_total) as pay_total'))
            ->groupBy(DB::raw('EXTRACT(YEAR FROM date)'))
            ->get();
        return view('admin.dashboard.index', $data, compact('tahun'));
        // $role = Auth::user()->hasRole('Kasir');
        // dd($role);
    }
}
