<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Cart;
use Auth;

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

    public function savecart(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = new Cart;
        $data->invoice_code = $request->invoice_code;
        $data->date = $request->date;
        $data->outlet_id = $request->outlet_id;
        $data->pay_date = $request->pay_date;
        $data->deadline = $request->deadline;
        $data->paket_id = $request->paket_id;
        $data->weight = $request->weight;
        $data->sub_total = $request->sub_total;
        $data->user_id = $user_id;
        $data->save();
        echo "sukses";
    }

    public function getCart()
    {
        $cart = Cart::orderBy('id', 'DESC')->where('user_id', Auth::user()->id)->get();
        return view('admin.transaction.getCart', compact('cart'));
    }

    public function delete_cart($cart_id)
    {
        $cart = Cart::find($cart_id);
        $cart->delete();
        echo "sukses";
    }
}
