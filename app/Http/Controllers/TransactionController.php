<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\Member;
use App\Models\Paket;

class TransactionController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Order List";
        $data['page_sub_title'] = "Order List";
        $data['transaction'] = Transaction::all();

        return view('admin.transaction.index', $data);
    }
    public function create()
    {
        $data['page_title'] = "Transaction";
        $data['page_sub_title'] = "Add Transaction";
        $data['outlet'] = Outlet::all();
        $data['member'] = Member::all();
        $data['paket'] = Paket::all();
        $data['invoice_code'] = Transaction::transaction_code();
        return view('admin.transaction.add', $data);
    }
}
