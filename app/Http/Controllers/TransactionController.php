<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Transaction;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Cart;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class TransactionController extends Controller
{
    public function index()
    {
        $data['page_title'] = "Order List";
        $data['page_sub_title'] = "Order List";
        // $transaction = DB::table('transaction')
        //     ->join('transaction_detail', 'transaction.invoice_code', '=', 'transaction_detail.invoice_code')
        //     ->join('member', 'transaction.member_id', '=', 'member.id')
        //     ->join('users', 'transaction.user_id', '=', 'users.id')
        //     ->select('transaction.*', 'transaction_detail.*', 'member.name as member_name', 'users.name as user_name')
        //     ->get();
        $transaction = Transaction::all();

        return view('admin.transaction.index', $data, compact('transaction'));
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

    public function kirimsemua(Request $request)
    {

        $user_id = Auth::user()->id;
        $transaction_code = Transaction::transaction_code();

        // DB::table('transaction')->insert([
        //     'invoice_code' => $transaction_code,
        //     'date' => $request->date,
        //     'member_id' => $request->member_id,
        //     'additional_cost' => $request->additional_cost,
        //     'discon' => $request->discount,
        //     'tax' => $request->tax,
        //     'status' => 'baru',
        //     'user_id' => $user_id,
        // ]);
        $transaction = new Transaction();
        $transaction->invoice_code = $transaction_code;
        $transaction->date = $request->date;
        $transaction->member_id = $request->member_id;
        $transaction->additional_cost = $request->additional_cost;
        $transaction->discon = $request->discount;
        $transaction->sub_total = $request->total;
        $transaction->paid = 'belum_dibayar';
        $transaction->pay_total = $request->pay_total;
        $transaction->tax = $request->tax;
        $transaction->status = 'baru';
        $transaction->user_id = $user_id;
        $transaction->save();

        $select = DB::table('cart')->where('user_id', $user_id)->get();
        foreach ($select as $s) {
            DB::table('transaction_detail')->insert([
                'invoice_code' => $s->invoice_code,
                'paket_id' => $s->paket_id,
                'outlet_id' => $s->outlet_id,
                'pay_date' => $s->pay_date,
                'deadline' => $s->deadline,
                'weight' => $s->weight,
            ]);
        }

        foreach ($select as $s) {
            DB::table('cart')->truncate([
                'invoice_code' => $s->invoice_code,
                'paket_id' => $s->paket_id,
                'outlet_id' => $s->outlet_id,
                'pay_date' => $s->pay_date,
                'deadline' => $s->deadline,
                'weight' => $s->weight,
            ]);
        }
        // $member_idd = $request->member_id;
        // $memberr = Member::find($member_idd);
        // $member_email = $memberr->email;
        // $member_name = $memberr->name;
        // Mail::to($member_email)->send(new MailNotify($member_name));
        return redirect()->route('transaction.index')->with(['success' => 'Data has been saved']);
    }

    public function print($id)
    {
        $data = Transaction::find($id);
        $invoice_code = $data->invoice_code;
        $transaction = DB::table('transaction')
            ->join('users', 'transaction.user_id', '=', 'users.id')
            ->join('member', 'transaction.member_id', '=', 'member.id')
            ->select('transaction.*', 'users.name as user_name', 'member.name as member_name')
            ->where('invoice_code', '=', $invoice_code)
            ->get();
        $transaction_detail = DB::table('transaction_detail')
            ->join('paket', 'transaction_detail.paket_id', '=', 'paket.id')
            ->join('outlet', 'transaction_detail.outlet_id', '=', 'outlet.id')
            ->select('transaction_detail.*', 'paket.paket_name as paket_name', 'outlet.name as outlet_name', 'paket.price as paket_price')
            ->where('invoice_code', '=', $invoice_code)
            ->get();

        // dd($transaction);
        return view('admin.transaction.print', compact('transaction', 'transaction_detail'));
    }

    public function edit($id)
    {
        $transaction = Transaction::find($id);
        return view('admin.transaction.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status = $request->status;
        $transaction->paid = $request->paid;
        $transaction->dibayar = $request->dibayar;
        $transaction->kembalian = $request->kembalian;
        $transaction->save();
        return redirect()->route('transaction.index')->with(['success' => 'Data has been updated']);
    }

    public function baru(Request $request)
    {
        $url = $request->fullUrl();
        // $transaction = DB::table('transaction')
        //     ->join('transaction_detail', 'transaction.invoice_code', '=', 'transaction_detail.invoice_code')
        //     ->join('member', 'transaction.member_id', '=', 'member.id')
        //     ->join('users', 'transaction.user_id', '=', 'users.id')
        //     ->select('transaction.*', 'transaction_detail.*', 'member.name as member_name', 'users.name as user_name')
        //     ->where('transaction.status', 'baru')
        //     ->get();
        $transaction = Transaction::where('status', '=', 'baru')->get();

        return view('admin.transaction.baru1', compact('transaction', 'url'));
    }

    public function proses()
    {
        // $transaction = DB::table('transaction')
        //     ->join('transaction_detail', 'transaction.invoice_code', '=', 'transaction_detail.invoice_code')
        //     ->join('member', 'transaction.member_id', '=', 'member.id')
        //     ->join('users', 'transaction.user_id', '=', 'users.id')
        //     ->select('transaction.*', 'transaction_detail.*', 'member.name as member_name', 'users.name as user_name')
        //     ->where('transaction.status', 'proses')
        //     ->get();
        $transaction = Transaction::where('status', '=', 'proses')->get();

        return view('admin.transaction.proses', compact('transaction'));
    }

    public function selesai()
    {
        // $transaction = DB::table('transaction')
        //     ->join('transaction_detail', 'transaction.invoice_code', '=', 'transaction_detail.invoice_code')
        //     ->join('member', 'transaction.member_id', '=', 'member.id')
        //     ->join('users', 'transaction.user_id', '=', 'users.id')
        //     ->select('transaction.*', 'transaction_detail.*', 'member.name as member_name', 'users.name as user_name')
        //     ->where('transaction.status', 'selesai')
        //     ->get();
        $transaction = Transaction::where('status', '=', 'selesai')->get();
        return view('admin.transaction.selesai', compact('transaction'));
    }

    public function diambil()
    {
        // $transaction = DB::table('transaction')
        //     ->join('transaction_detail', 'transaction.invoice_code', '=', 'transaction_detail.invoice_code')
        //     ->join('member', 'transaction.member_id', '=', 'member.id')
        //     ->join('users', 'transaction.user_id', '=', 'users.id')
        //     ->select('transaction.*', 'transaction_detail.*', 'member.name as member_name', 'users.name as user_name')
        //     ->where('transaction.status', 'diambil')
        //     ->get();
        $transaction = Transaction::where('status', '=', 'diambil')->get();

        return view('admin.transaction.diambil', compact('transaction'));
    }
}
